<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    // app/Models/News.php
    protected $fillable = [
        'title',
        'content',
        'image_url',
        'is_featured',
        'user_id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
