<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Merchant extends Model
{
    protected $fillable = [
    	'merchant_uuid','name','description',
    	'telephone','facebook','twitter',
    	'website','email','is_active'
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
