<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ministry extends Model
{
    protected $fillable = [
        'name',
        'description',
        'image',
        'meeting_time',
        'location',
        'status',
        'total_slots',
    ];

    // public function users()
    // {
    //     return $this->belongsToMany(User::class)
    //         ->withPivot('portfolio')
    //         ->withTimestamps();
    // }

    
    // Dalam Ministry.php
public function users()
{
    return $this->belongsToMany(User::class);
}


    protected static function boot()
    {
        parent::boot();

        // Cascade delete for related pivot data
        static::deleting(function ($ministry) {
            $ministry->users()->detach(); // Detach pivot data when a ministry is deleted
        });
    }
}
