<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PendingPayout extends Model
{
    /** @use HasFactory<\Database\Factories\PendingPayoutFactory> */
    use HasFactory;
    protected $fillable = ['external_id', 'user_id', 'amount', 'bank_code'];
}
