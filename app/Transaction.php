<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    protected $fillable = [
    	'JP_PASSWORD', 'JP_CUSTOMER_NAME', 'JP_TRANID',
    	'JP_MERCHANT_ORDERID', 'JP_ITEM_NAME', 'JP_AMOUNT', 'JP_CURRENCY',
    	'JP_TIMESTAMP', 'JP_PASSWORD', 'JP_CHANNEL' ,'IS_VALID'
    ];

    public function order()
    {
        return $this->belongsTo(
        	Order::class, 'transaction_uuid', 'JP_TRANSID'
    	);
    }
}
