@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <img src="/uploads/avatar/{{$user->picture}}" alt="profile picture" class="settings-avatar-image">
            <div class="profile-image">
                <h2>{{ucfirst($user->name)}}'s Profile</h2>
            </div>
        </div>
    </div>
</div>
@endsection
