<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Ticket;
use App\Comment;
use App\User;
class PagesController extends Controller
{
    //

    public function index(){

        $tickets = Ticket::all();

        return view('pages.index')->with('tickets',$tickets);

    }

    public function about(){

        return view('pages.about');
        
    }
    public function show($id){

        $ticket = Ticket::find($id);
       // $comments = Comment::find($ticket->ticket_id);
       // $comments = Comment::where('ticket_id', $id)->get();
        $comments = $ticket->comment;
        $user_id = $comments->pluck('user_id');
        $user = User::where('id',$user_id)->get();
        //$user = Comment::find($comments->ticket_id);
       // $data = ['ticket' => $ticket, 'comments' => [$comments] ];
        return view('pages.show',compact('ticket','comments','user'));

    }
}

