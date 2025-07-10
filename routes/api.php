<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MidtransController;


// Deprecated: Ini nanti pindahin ke route web.php

// Create Payment
Route::post('/midtrans/payment', [MidtransController::class, 'createPayment'])->name('midtrans.payment');

// Webhook / Callback
Route::match(['post', 'get'], '/midtrans/callback', [MidtransController::class, 'paymentCallback'])->name('midtrans.callback');

Route::get('/user/balance', function () {
    $userId = 1;

    $balance = \App\Models\Balance::where('user_id', $userId)->first();
    $transactions = \App\Models\BalanceTransaction::where('user_id', $userId)->get();

    return response()->json([
        'balance' => $balance,
        'transactions' => $transactions,
    ]);
});