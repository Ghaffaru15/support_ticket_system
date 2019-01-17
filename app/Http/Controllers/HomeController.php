<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Ticket;
use App\User;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $user_id = auth()->user()->id;

        $tickets = Ticket::where('user_id',$user_id)->get();
       // $user = User::find($user_id);

        //return view('home')->with('tickets',$user->tickets());
        return view('home')->with('tickets',$tickets)
;    }
}
