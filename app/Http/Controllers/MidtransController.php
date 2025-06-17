<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use App\Models\Balance;
use App\Models\BalanceTransaction;

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

    // Generate Midtrans Payment URL
    public function createPayment(Request $request)
    {
        $request->validate([
            'amount' => 'required|numeric|min:1',
        ]);

        // Hardcoded user ID for testing
        $userId = 1;

        $orderId = 'order-' . Str::random(8) . '-' . time();

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
                        'first_name' => $request->first_name,
                        'last_name' => $request->last_name,
                        'email' => $request->email,
                        'phone' => $request->phone,
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

            $body = json_decode($response->getBody(), true);

            session([
                'pending_payment' => [
                    'order_id' => $orderId,
                    'user_id' => $userId,
                    'amount' => $request->amount,
                ]
            ]);

            return response()->json([
                'redirect_url' => $body['redirect_url']
            ]);
        } catch (\Exception $e) {
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

        return response('OK', 200);
    }
}