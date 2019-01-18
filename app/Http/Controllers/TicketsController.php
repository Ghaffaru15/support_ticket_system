<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Ticket;
class TicketsController extends Controller
{

    public function __construct(){

        $this->middleware('auth');

    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('tickets.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $this->validate($request,[
            'title' => 'required',
            'content' => 'required'
        ]);
        
        $slug = uniqid();
        $ticket = new Ticket;
        $ticket->title = $request->input('title');
        $ticket->content = $request->input('content');
        $ticket->slug = $slug;
        $ticket->user_id = auth()->user()->id;
        $ticket->save();

        return redirect('/home')->with('status','Your ticket has been created, its uniq id is: ' . $slug);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $ticket = Ticket::findOrFail($id);
        $user_id = auth()->user()->id;
       
        if ($ticket->user_id != $user_id){
            return redirect('/home')->with('id','Unauthorized Page');
        }
        return view('/tickets/show')->with('ticket',$ticket);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $ticket = Ticket::findOrFail($id);
        $user_id = auth()->user()->id;

        if ($user_id != $ticket->user_id){
            return redirect('/home')->with('id','Unauthorized Page');
        }

        return view('/tickets/edit')->with('ticket',$ticket);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $ticket = Ticket::findOrFail($id);

        $user_id = auth()->user()->id;

        $ticket->title = $request->input('title');
        $ticket->content = $request->input('content');
        $ticket->user_id = $user_id;
        if ($request->status != null)
            $ticket->status = 0;
        else
            $ticket->status = 1;

       $ticket->save();

       return redirect('/home')->with('status','Ticket Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
        $ticket = Ticket::find($id);

        $ticket->delete();

        return redirect('/home')->with('status','Ticket Deleted');
    }
}
