<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use App\Models\Balance;
use App\Models\BalanceTransaction;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class MidtransController extends Controller
{
    protected $serverKey;
    protected $isProduction;
    protected $baseUrl;

    public function __construct()
    {
        $this->serverKey = env('MIDTRANS_SERVER_KEY');
        $this->isProduction = filter_var(env('MIDTRANS_IS_PRODUCTION'), FILTER_VALIDATE_BOOLEAN);
        $this->baseUrl = $this->isProduction
            ? 'https://app.midtrans.com/snap/v1/transactions' 
            : 'https://app.sandbox.midtrans.com/snap/v1/transactions'; 
    }

    public function register()
    {
        return view('topup.payment');
    }
    // Generate Midtrans Payment URL
    public function createPayment(Request $request)
    {
        // TODO: Ubah dari RP ke token
        $request->validate([
            'amount' => 'required|numeric|min:1',
        ]);

        $user = Auth::user()->load('student');

        if (!$user) {
            return response()->json([
                'error' => 'Unauthorized. User not logged in.'
            ], 401);
        }
        // TODO: User data masih belum ke ekstraks 
        $userId = $user->id;
        $user_name = $user->students->name ?? 'Unknown User';
        $user_email = $user->email ?? 'Unknown Email';
        $user_nim = $user->students->nim ?? 'Unknown NIM';



        $orderId = 'order-' . Str::random(8) . '-' . time();

        \Log::info("Before sending request to Midtrans", [
            'url' => $this->baseUrl,
            'amount' => $request->amount,
            'server_key_present' => !empty($this->serverKey),
        ]);

        $client = new Client();
        try {
            $response = $client->post($this->baseUrl, [
                'auth' => [$this->serverKey, ''],
                'json' => [
                    'transaction_details' => [
                        'order_id' => $orderId,
                        'gross_amount' => $request->amount,
                    ],
                    'customer_details' => [
                        'first_name' => $user_name,
                        'last_name' => '',
                        'email' => $user_email,
                        'phone' => '081234567890', // Example phone number, replace with actual
                    ],
                    'callbacks' => [
                            'finish' => route('midtrans.callback', [
                            'user_id' => $userId,
                            'amount' => $request->amount,
                        ]),
                    ]
                ],
                'verify' => false , // Disable SSL verification (REMEMBER TO ENABLE THIS IN PRODUCTION)
            ]);
            \Log::info("Midtrans response received", [
                'status' => $response->getStatusCode(),
                'body' => substr($response->getBody(), 0, 200) // first 200 chars
            ]);

            $body = json_decode($response->getBody(), true);
            \Log::info("Midtrans API Response", ['response' => $body]);

            session([
                'pending_payment' => [
                    'order_id' => $orderId,
                    'user_id' => $userId,
                    'amount' => $request->amount,
                ]
            ]);

            return redirect($body['redirect_url']);

        } catch (\Exception $e) {
            \Log::error("Midtrans Payment Failed", [
                'message' => $e->getMessage(),
                'trace' => $e->getTraceAsString()
            ]);

            return response()->json([
                'error' => 'Failed to create payment.',
                'message' => $e->getMessage(),
            ], 500);
        }
    }

    public function paymentCallback(Request $request) {
        \Log::info("Midtrans Callback", $request->all());

        $data = $request->all();

        $orderId = $data['order_id'] ?? null;
        $transactionStatus = $data['transaction_status'] ?? null;
        $fraudStatus = $data['fraud_status'] ?? 'not_set';

        // Get user_id and amount from query params (we added them ourselves)
        $userId = $request->input('user_id');
        $amount = $request->input('amount');

        \Log::info("Processing payment", compact('orderId', 'transactionStatus', 'fraudStatus', 'userId', 'amount'));

        if (!$orderId || !$userId || !$amount) {
            return response()->json(['error' => 'Missing required parameters'], 400);
        }

        // Convert amount to float
        $amount = (float)$amount;

        if (($transactionStatus == 'capture' || $transactionStatus == 'settlement') && ($fraudStatus == 'accept' || $fraudStatus == 'challenge' || $fraudStatus == 'not_set')) {
            \Log::info("Entering balance update block");

            // Update balance
            $balance = Balance::firstOrCreate(['user_id' => $userId]);
            \Log::info("Balance before increment", ['current_balance' => $balance->amount]);

            $balance->increment('amount', $amount);
            \Log::info("Balance after increment", ['new_balance' => $balance->fresh()->amount]);

            // Log transaction
            $transaction = BalanceTransaction::create([
                'user_id' => $userId,
                'balance_id' => $balance->id,
                'transaction_type' => 'top_up',
                'amount' => $amount,
                'reference_type' => 'MidtransPayment',
                'reference_id' => $orderId,
            ]);

            \Log::info("Balance transaction created", ['transaction_id' => $transaction->id]);
        }

        return redirect('/');
    }
}