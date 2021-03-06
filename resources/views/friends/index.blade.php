@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
             <div class="panel panel-default">
                  <div class="panel-heading">Add Friend</div>
                  <div class="panel-body">
                      <form action="/friends/add" method="POST" role="form">
                          <input type="hidden" value="{{ csrf_token() }}" name="_token">
                          <div class="form-group">
                              <label for="inputEmail">Email</label>
                              <input class="form-control" type="email" name="inputEmail" value="">
                          </div>
                          <button type="submit" class="btn btn-primary">Add friend</button>
                      </form>
                  </div>
             </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Manage Friends</div>
                <div class="panel-body">
                    @if ($friends)
                        @foreach ($friends as $friend)
                            <div class="friend-list-user">
                                <div class="friend-list-user-image">
                                    <img src="/uploads/avatar/{{$friend->picture}}" alt="profile picture" class="avatar-small">
                                    @if($friend->isOnline())
                                        <i class="fa fa-circle color-online"></i>
                                    @endif
                                </div>
                                <div class="friend-list-user-name">
                                    {{ $friend->name }}
                                    <a href="/friends/delete/{{ $friend->id }}" class="pull-right btn btn-danger">X</a>
                                </div>
                            </div>
                        @endforeach
                    @else
                        <p> Oh, looks like you don't have any friends...</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
