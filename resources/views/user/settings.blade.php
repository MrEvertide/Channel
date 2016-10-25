@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">{{Auth::user()->name}}'s profile</div>
                <div class="panel-body">
                    <img src="/uploads/avatar/{{Auth::user()->picture}}" alt="">

                    <form enctype="multipart/form-data" action="/settings" method="POST">
                        <label for="">Update profile image</label>
                        <input type="file" name="avatar">
                        <input type="hidden" name="_token" value="{{csrf_token()}}">
                        <button type="submit" class="pull-right btn btn-sm btn-primary">Upload picture</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
