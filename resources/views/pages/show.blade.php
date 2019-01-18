@extends('layouts.app');

@section('content')

    <div class="container">
            <div class="row justify-content-center">
                    <div class="col-md-8">
                        <div class="card">
                            <div class="card-header">
                               <h2>Current Ticket </h2>
                            </div>
                            <div class="card-body">
                                
                                <div class="row">
                                    <div class="col-md-4">
                                    <h4 text-align="center">Title:</h4>
                                    </div>
                                    <div class="col-md-8">
                                        <h5>{{$ticket->title}}</h5>
                                    </div>
                                    <hr style="font-weight: bold;"><br /><br />
                            </div>
                                <div class="row">
                                    <div class="col-md-4">
                                        <h3>Content:</h3>
                                    </div>
                                    <div class="col-md-8">
                                        <h4>{{$ticket->content}}</h4>
                                    </div>
                                </div>
                               
                                <br /><br />
                                        <form action="/">
                                    
                                                <div class="form-group">
                                                    <label for="comment">Give a comment</label>
                                                    
                                                    <textarea name="comment" col="70" class="form-control"></textarea>
                                                </div>
                                                <input type="hidden" name="ticket_id" value="{{$ticket->id}}" />
                                                <div class="form-group">
                                                    <input type="submit" class="btn btn-info" value="Comment">
                                                </div>
                                            </form>
                                
                            </div>
                        </div> 
                    </div> 
    </div>

@endsection