<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Ticket;
use App\Http\Requests;
use App\Http\Resources\Ticket as TicketResource;
class ApiTicketsController extends Controller
{
    //
    public function index(){

        $tickets = Ticket::paginate(2);

        return TicketResource::collection($tickets);

    }

    public function show($id){

        //get one ticket
        $ticket = Ticket::findOrFail($id);

        return new TicketResource($ticket);

    }

    public function store(Request $request){

        $ticket = $request->isMethod('put') ? Ticket::findOrFail($request->ticket_id) : new Ticket;

       // $ticket->id = $request->input('ticket_id');
        $ticket->title = $request->input('title');
        $ticket->content = $request->input('content');
        $ticket->user_id = $request->input('user_id');
        
        if ($ticket->save()){
            
            return new TicketResource($ticket);
     }

}

public function destroy($id){

    $ticket = Ticket::findOrFail($id);

    if ($ticket->delete()){


        return new TicketResource($ticket);

    }
}
}