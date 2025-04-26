<?php

// app/Models/User.php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'name',
        'email',
        'password',
        'role_id',
        'area_id',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    // Role constants
    const ROLE_ADMIN = 1;
    const ROLE_COUNCIL = 2;
    const ROLE_BUSINESS = 3;
    const ROLE_RESIDENT = 4;

    public function details()
    {
        return $this->hasOne(UserDetail::class);
    }

    public function isAdmin()
    {
        return $this->role_id === self::ROLE_ADMIN;
    }

    public function isResident()
    {
        return $this->role_id === self::ROLE_RESIDENT;
    }

    public function isCouncil()
    {
        return $this->role_id === self::ROLE_COUNCIL;
    }

    public function isBusiness()
    {
        return $this->role_id === self::ROLE_BUSINESS;
    }
}
