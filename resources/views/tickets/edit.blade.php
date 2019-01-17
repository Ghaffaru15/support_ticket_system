@extends('layouts.app')

@section('content')
    
<div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header"><h3>Edit Ticket</h3></div>
    
                    <div class="card-body">
                        {!!Form::open(['action' => ['TicketsController@update',$ticket->id], 'method' => 'POST'])!!}
                           <div class="form-group">     
                                {{Form::label('title','Title')}}
                                {{Form::text('title',$ticket->title,['class' => 'form-control'])}}
                           </div>
                           <div class="form-group">
                                {{Form::label('content','Content')}}
                                {{Form::textarea('content',$ticket->content,['class' => 'form-control'])}}
                           </div>
                           <div class="form-group">
                               
                                {{Form::checkbox('status',$ticket->status?"":"checked",['class' => 'form-control'])}}
                                {{Form::label('check','Close this Ticket')}}
                           </div>
                           {{Form::hidden('_method','PUT')}}
                           <div class="form-group">
                                {{Form::submit('Edit',['class' => 'btn btn-primary'])}}
                           </div>
                        {!!Form::close()!!}
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection