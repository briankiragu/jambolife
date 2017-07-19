<?php

namespace App\Http\Controllers\Admin;


use Validator;
use App\Event;
use App\TicketTier;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TicketTierController extends Controller
{
	protected $ticket, $event;

    /**
    * Default clss constructor
    */
    public function __construct(Request $request, TicketTier $ticketTier, Event $event)
    {
        // Instantiate the ticket, ticket-tier and event.
        $this->event = $event;
        $this->model = $ticketTier;

        // Instantiate the validator.
        $this->validator = Validator::make($request->all(), [
            //
        ]);

        // Model blade slug.
        $this->slug = 'ticket-tier';
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($uuid = null)
    {
        return view($this->slug .'.index', [
            'payload' => [
            	'event' => $this->event->find($uuid),
                $this->slug .'s' => $this->model->where('event_uuid', $id)->paginate(15),
                'message' => ''
            ],
            'status' => http_response_code()
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($uuid = null, $id)
    {
        return view($this->slug .'.edit', [
            'payload' => [
            	'event' => $this->event->find($uuid),
                'ticket' => $this->model->find($id),
                'message' => ''
            ],
            'status' => http_response_code()
        ]);
    }
}
