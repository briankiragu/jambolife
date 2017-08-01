<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    protected $fillable = [
    	'event_uuid', 'merchant_uuid', 'name', 'event_type_id', 'city',
    	'street', 'building', 'coordinates', 'big_image', 'small_image',
    	'description', 'video', 'sales_close', 'event_start', 'event_end'
	];

    protected $appends = ['merchant_name', 'event_type_name'];

    public function tickets()
    {
        return $this->hasMany(
            App\Ticket::class, 'event_uuid', 'event_uuid'
        );
    }

    public function ticketTiers()
    {
        return $this->hasMany(
            App\TicketTier::class, 'event_uuid', 'event_uuid'
        );
    }

    public function merchant()
    {
        return $this->belongsTo(
        	Merchant::class, 'merchant_uuid', 'event_uuid'
    	);
    }

    public function eventType()
    {
        return $this->belongsTo(
        	EventType::class, 'id', 'event_uuid'
    	);
    }

    /**
     * Append the name of the event merchant.
     */
    public function getMerchantNameAttribute()
    {
        return $this->merchant()->fname .' '. $this->merchant()->lname;
    }

    /**
     * Append the event type name.
     */
    public function FunctionName($value='')
    {
        return $this->eventType()->name;
    }
}
