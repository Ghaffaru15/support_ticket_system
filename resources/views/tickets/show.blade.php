@extends('layouts.app')

@section('content')
    <div class="container">

        <div class="row justify-content-center">

            <div class="col-md-8">
                
                <div class="card">
                    <div class="card-header"> 
                        <button class="btn btn-info"><a href="/home" >Back</a></button>
                        
                        Ticket View
                    </div>

                    <div class="card-body">
                        <table class="table table-striped">
                            <tr>
                                <th>Title</th>
                                <td>{{$ticket->title}}</td>
                            </tr>
                            <tr>
                                <th>Description</th>
                                <td>{{$ticket->content}}
                            </tr>
                            <tr>
                                <th>Status</th>
                                <td>{{$ticket->status ? 'Pending':'Answered'}}
                            </tr>
                        </table>

                       
                      
                      {!!Form::open(['action' => ['TicketsController@destroy',$ticket->id],'method' => 'POST','class' => 'pull-right'])!!}
                      <a href="/ticket/{{$ticket->id}}/edit" class="btn btn-primary">Edit </a>
                         {{Form::hidden('_method','DELETE')}}
                            {{Form::submit('Delete',['class'=> 'btn btn-danger'])}}
                            
                        {!!Form::close()!!}
                      
                    </div>

                </div>

            </div>

        </div>

    </div>

@endsection