<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Work extends Model
{
    // If you use mass assignment:
    protected $fillable = [
        'title', 'description', 'user_id', 'tag_id', 'credit', 'source', 'image',
    ];

    // Define many-to-many relation with tags
    public function tag()
    {
        return $this->belongsTo(Tag::class);
    }

    // Define relation with user (author)
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}