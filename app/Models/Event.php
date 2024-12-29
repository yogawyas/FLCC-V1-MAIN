<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    protected $fillable = [
        'title',
        'description',
        'image',
        'date',
        'location',
        'status',
        'max_participants'
    ];

    public function users()
    {
        return $this->belongsToMany(User::class)->withTimestamps();
    }

    // Accessor untuk format tanggal
    public function getFormattedDateAttribute()
    {
        return \Carbon\Carbon::parse($this->date)->format('F j, Y');
    }

    // Mutator untuk status
    public function setStatusAttribute($value)
    {
        $this->attributes['status'] = strtoupper($value);
    }
}
