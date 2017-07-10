<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Currency extends Model
{
    protected $table = 'currencies';

    protected $fillable = [
    	'title', 'symbol', 'position',
    	'decimal_place', 'value', 'status'
	];

    public function ticketTier()
    {
        $this->hasMany(Ticket::class);
    }
}
