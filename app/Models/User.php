<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'first_name', 'last_name', 'username', 'email', 'password', 'role', 'active', 'profile_photo'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    protected $appends = [
        'name', 'active_status'
    ];

    public function getProfilePhotoAttribute()
    {
        return (!empty($this->profile_photo)) ? $this->profile_photo : asset('assets/images/placeholder.jpg');
    }

    public function getNameAttribute()
    {
        return "{$this->first_name} {$this->last_name}";
    }

    public function getActiveStatusAttribute()
    {
        return (!empty($this->active) && !is_null($this->active) && $this->active === 1) ? "Yes" : "No";
    }

    public function setPasswordAttribute($password)
    {
        $this->attributes['password'] = bcrypt($password);
    }

    public function hasRole($role_name)
    {
        return !! ($this->role === strtolower($role_name));
    }
}
