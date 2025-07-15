<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Student extends Model
{
    protected $guarded = ["id"];
    protected $fillable = ["user_id", "nim", "name", "student_proof"];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
