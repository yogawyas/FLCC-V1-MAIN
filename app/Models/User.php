<?php

// app/Models/User.php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Models\Event;
use App\Models\Ministry;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use HasRoles;

    protected $fillable = [
        'name',
        'email',
        'password',
        'is_admin',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
        'is_admin' => 'boolean',
    ];

    // Add these relationship methods
    public function events()
    {
        return $this->belongsToMany(Event::class)->withTimestamps();
    }

    public function ministries()
    {
        return $this->belongsToMany(Ministry::class)
            ->withPivot('portfolio')
            ->withTimestamps();
    }

    public function isAdmin(): bool
    {
        return $this->is_admin === true;
    }
}
