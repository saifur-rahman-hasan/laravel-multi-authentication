<?php

namespace App\Models;

use Spatie\Permission\Traits\HasRoles;
use Illuminate\Notifications\Notifiable;
use App\Notifications\AdminResetPasswordNotification;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Admin extends Authenticatable
{
    use Notifiable, HasRoles;

    protected $guard = 'admins';
    protected $guard_name = 'admins';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'first_name',
        'last_name',
        'username',
        'email',
        'password',
        'active',
        'role',
        'profile_photo'
    ];

    protected $appends = [
        'name', 'active_status'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
    
    public function getProfilePhotoAttribute()
    {
        return (!empty($this->profile_photo)) ? $this->profile_photo : asset('assets/images/placeholder.jpg');
    }

    public function setPasswordAttribute($password)
    {
        $this->attributes['password'] = bcrypt($password);
    }

    public function getNameAttribute()
    {
        return "{$this->first_name} {$this->last_name}";
    }

    public function hasRole($role_name)
    {
        return !! ($this->role === strtolower($role_name));
    }

    public function getActiveStatusAttribute()
    {
        return (!empty($this->active) && !is_null($this->active) && $this->active === 1) ? "Yes" : "No";
    }
    
    public function sendPasswordResetNotification($token)
    {
        $this->notify(new AdminResetPasswordNotification($token));
    }
}
