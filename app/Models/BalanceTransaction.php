<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BalanceTransaction extends Model
{
    protected $fillable = [
        'user_id',
        'balance_id',
        'transaction_type',
        'amount',
        'reference_type',
        'reference_id'
    ];

    public function user()
    {
        return $this->belongsTo(\App\Models\User::class);
    }

    public function balance()
    {
        return $this->belongsTo(\App\Models\Balance::class);
    }
}
