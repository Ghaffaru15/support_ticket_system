@extends('layouts.app')

@section('content')
   
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
              {{--  @foreach ($errors->all() as $error)
                    <p class="alert alert-danger">{{$error}}</p>
                    @endforeach 
                --}}
                <div class="card">
                    <div class="card-header">
                        <h2>Submit a new ticket</h2>
                    </div>
                    <div class="card-body">
                    {!!Form::open(['action' => 'TicketsController@store','method' => 'POST'])!!}

                        <div class="form-group">
                            {{Form::label('title','Title')}}
                            {{Form::text('title','',['class' => 'form-control','required'])}}
                          {{--  @if ($errors->title == [])
                                
                            @else
                                <p class="alert alert danger">{{$errors->title}}</p>
                            @endif
                          --}}
                        </div>
                        
                        <div class="form-group">
                            {{Form::label('content','Content')}}
                            {{Form::textarea('content','',['class' => 'form-control','required'])}}
                            <span class="help-block">Feel free to ask us any question</span>
                        </div>

                        <div class="form-group">
                            {{Form::reset('Cancel',['class' => 'btn btn-default'])}}
                            {{Form::submit('Submit',['class' => 'btn btn-primary'])}}
                        </div>
                    {!!Form::close()!!}
                </div>
            </div>
        </div>
    </div>
@endsection