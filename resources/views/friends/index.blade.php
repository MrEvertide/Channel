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
                          <button type="submit" class="btn btn-default">Submit</button>
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
                            <p>
                                {{ $friend->name }}
                                <a href="/friends/delete/{{ $friend->id }}" class="pull-right btn btn-danger">X</a>
                            </p>
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
