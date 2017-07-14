<?php

namespace App\Http\Controllers;

use Validator;
use App\Event;
use App\Ticket;
use Illuminate\Http\Request;

class TicketController extends Controller
{
	protected $event;
    
    /**
    * Default clss constructor
    */
    public function __construct(Request $request, Ticket $ticket, Event $event)
    {
        // Instantiate the ticket, ticket-tier and event.
        $this->model = $ticket;
        $this->event = $event;

        // Instantiate the validator.
        $this->validator = Validator::make($request->all(), [
        	// 
        ]);

        // Model blade slug.
        $this->slug = 'ticket';
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
