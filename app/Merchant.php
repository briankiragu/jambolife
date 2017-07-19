<?php

namespace App;

use Spatie\Permission\Traits\HasRoles;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Merchant extends Authenticable
{
    use Notifiable, HasRoles;

    /**
     * The attribures that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
    	'merchant_uuid', 'name', 'description',
    	'telephone', 'facebook', 'twitter',
    	'website', 'email', 'is_active'
	];

    public function events()
    {
        return $this->hasMany(
        	 Event::class, 'merchant_uuid', 'merchant_uuid'
    	);
    }

    public function users()
    {
        return $this->hasMany(
        	 User::class, 'merchant_uuid', 'merchant_uuid'
    	);
    }
}
