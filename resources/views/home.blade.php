@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}

                        </div>
                    @endif
                    @if (count($tickets) > 0)
                        <h2>Your Tickets</h2>
                        <table class="table table-striped">
                            <tr>
                                <th>No.</th>
                                <th>Title</th>
                                <th>Status</th>
                                <th></th>
                            </tr>
                            <?php $number = 1; ?>
                            @foreach ($tickets as $ticket)

                                <tr>
                                    <td>{{$number}}</td>
                                    <td>{{$ticket->title}}</td>
                                    <td>{{$ticket->status ? 'Pending' : 'Answered'}}
                                    <td><a href="../ticket/{{$ticket->id}}">view</a></td>
                                </tr>
                               <?php $number++; ?>
                            @endforeach
                        </table>
                    @else
                        <h3>You have not sent tickets</h3>
                    @endif
                   
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
