<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
	/**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
    	'ticket_uuid', 'ticket_tier_id', 'transaction_uuid',
    	'order_uuid', 'user_uuid', 'event_uuid', 
        'is_claimed', 'claimed_at', 'agent_uuid', 'is_valid'
    ];

    public function user()
    {
    	return $this->belongsTo(
    		User::class, 'user_uuid', 'user_uuid'
		);
    }
}
