@extends('layouts.app');

@section('content')

<div class="container">
    <div class="jumbotron">
        <h2 align="center">Welcome to the platform</h2>
        <p align="center">Feel free to push your issues to us, and we will address it as early as possible</p>
    </div>
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                   <h2> All Tickets Available</h2>
                </div>
                <div class="card-body">
                    @if (count($tickets) > 0)
                        <table class="table table-stripped">
                            <tr>
                                <th>Title</th>
                                <th>Created</th>
                                <th></th>
                            </tr>
                        @foreach ($tickets as $ticket)

                            <tr>
                                <td>{{$ticket->title}}
                                <td>{{$ticket->created_at->diffForHumans() }}
                                <td><a class="col" href="/{{$ticket->id}}">view</a>
                            </tr>

                        @endforeach
                        </table>
                    @endif
                </div>
            </div>  
        </div>
    </div>
</div>

@endsection