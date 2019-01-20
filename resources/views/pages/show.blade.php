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
                                      <h5>  {{ $ticket->title }} </h5> 
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
                                <div class="row">
                                    <div class="col-md-12">
                                    @if (count($comments) > 0)
                                    <h4>Comments available</h4>
                                    <hr><ul>
                                        @foreach ($comments as $comment)

                                            <li>{{ $comment->comment }} </li>
                                            <small>By {{ $user->pluck('name') }} </small>
                                            <br /><hr>
                                        @endforeach
                                    </ul>
                                    @else
                                        <p>No comments available</p>
                                    @endif
                                </div>
                                </div>
                                @if (!Auth::guest())
                                        <form action="/pages/{{ $ticket->id }}" method="post">
                                                {{ csrf_field() }}
                                                <div class="form-group">
                                                    <label for="comment">Give a comment</label>
                                                    
                                                    <textarea name="comment" col="70" class="form-control"></textarea>
                                                </div>
                                                
                                                <div class="form-group">
                                                    <input type="submit" class="btn btn-info" value="Comment">
                                                </div>
                                            </form>
                                @else

                                            <h4 style="color:red;">Please login to add a comment</h4>
                                
                                 @endif
                                
                            </div>
                        </div> 
                    </div> 
    </div>

@endsection