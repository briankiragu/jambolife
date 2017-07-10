<?php

namespace App;

use Spatie\Permission\Traits\HasRoles;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable, HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_uuid', 'fname', 'lname', 'email', 'phone',
        'dob', 'identification', 'password', 'is_active',
        'api_token', 'role_id', 'remember_token', 'merchant_uuid'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function tickets()
    {
        return $this->hasMany(
            Ticket::class, 'user_uuid', 'user_uuid'
        );
    }

    public function orders()
    {
        return $this->hasMany(
            Order::class, 'user_uuid', 'user_uuid'
        );
    }

    public function roles()
    {
        $this->setPrimaryKey('user_uuid');
        $return = $this->belongsToMany(
            Role::class, 'role_user', 'user_uuid', 'role_id'
        );
        $this->setPrimaryKey('id');
        return $return;
    }

    protected function setPrimaryKey($key)
    {
        $this->primaryKey = $key;
    }

    public function merchant()
    {
        return $this->belongsTo(
            Merchant::class, 'merchant_uuid', 'user_uuid'
        );
    }

    public function getRoles()
    {
        return $this->roles->pluck('name')->toArray();
    }

    public function hasRole($role)
    {
        if (in_array($role, $this->roles->pluck('name')->toArray())) {
            return true;
        }
        return false;
    }
}
