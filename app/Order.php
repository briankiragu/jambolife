<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
    	'order_uuid', 'user_uuid', 'transaction_uuid',
    	'order_details', 'order_total', 'is_valid', 'is_payable'
	];

    protected $casts = [
        'order_details' => 'json'
    ];

    public function user()
    {
        return $this->belongsTo(
        	User::class, 'user_uuid', 'user_uuid'
    	);
    }

    public function transaction()
    {
        return $this->belongsTo(
        	Transaction::class, 'JP_TRANID', 'transaction_uuid'
    	);
    }
}
