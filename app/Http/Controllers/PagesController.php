<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Ticket;
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
}

