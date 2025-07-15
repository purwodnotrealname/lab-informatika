<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Tag extends Model
{
    public $guarded = ["id"];

    public function projects(): HasMany
    {
        return $this->hasMany(Work::class);
    }
}
