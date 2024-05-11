<?php

namespace App;

use App\Model\Official;
use Illuminate\Support\Str;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable implements MustVerifyEmail
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'role', 'status', 'official_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function official()
    {
        return $this->belongsTo(Official::class, 'official_id', 'id');
    }

    public function isAdmin()
    {
        return $this->role == 'Admin';
    }
    public function hasRole($role)
    {
        return Str::lower($this->role)  == Str::lower($role);
    }
    public function hasPosition($position)
    {
        return Str::lower($this->official->position) == Str::lower($position);
    }
}
