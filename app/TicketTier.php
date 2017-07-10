<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TicketTier extends Model
{
    protected $fillable = [
    	'name', 'event_uuid', 'price',
    	'currency_id', 'ticket_limit', 'close_date'
	];

    public function currency()
    {
        return $this->belongsTo(Currency::class);
    }

    public function tickets()
    {
        return $this->hasMany(Ticket::class, 'ticket_uuid');
    }
}
