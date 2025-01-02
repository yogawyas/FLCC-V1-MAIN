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
        'max_participants',
    ];

    protected $casts = [
        'date' => 'datetime', // Konversi kolom 'date' menjadi objek Carbon
    ];

    public function users()
    {
        return $this->belongsToMany(User::class)->withTimestamps();
    }

    // Accessor untuk format tanggal panjang
    public function getFormattedDateAttribute()
    {
        return $this->date->format('F j, Y'); // Contoh: January 1, 2025
    }

    // Mutator untuk status
    public function setStatusAttribute($value)
    {
        $this->attributes['status'] = strtoupper($value); // Simpan status dalam huruf besar
    }
}
