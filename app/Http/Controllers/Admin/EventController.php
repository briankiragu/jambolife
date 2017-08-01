<?php

namespace App\Http\Controllers\Admin;

use Validator;
use App\Event;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class EventController extends Controller
{
  /**
    * Default clss constructor
    */
    public function __construct(Event $event, Request $request)
    {
        // Instantiate the event.
        $this->model = $event;

        // Instantiate the validator.
        $this->validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'city' => 'required|string|min:5|max:255',
            'street' => 'required|string|min:5|max:255',
            'description' => 'required|string|min:50',
            'sales_close' => 'required|date',
            'event_start' => 'required|date',
            'event_end' => 'required|date'
        ]);

        // Model blade slug.
        $this->slug = 'event';
    }
}
