<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PendingPayment extends Model
{

    protected $fillable = ['external_id', 'user_id', 'amount'];
    /** @use HasFactory<\Database\Factories\PendingPaymentFactory> */
    use HasFactory;

    
}

