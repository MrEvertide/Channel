@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <img src="/uploads/avatar/{{Auth::user()->picture}}" alt="profile picture" class="settings-avatar-image">
            <div class="profile-image">
                <h2>{{Auth::user()->name}}'s profile</h2>
                <form enctype="multipart/form-data" action="/settings" method="POST" class="avatar-form">
                    <label for="avatar">Change your avatar</label>
                    <input type="file" name="avatar">
                    <input type="hidden" name="_token" value="{{csrf_token()}}">
                    <button type="submit" class="pull-right btn btn-sm btn-primary">Upload picture</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
