@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel-default panel panel-trans">
                <div class="panel-body">
                    <img src="/uploads/avatar/{{$user->picture}}" alt="profile picture" class="settings-avatar-image">
                    <div class="profile-image">
                        <h2>{{ucfirst($user->name)}}'s Profile</h2>
                        @if (Auth::user() === $user)
                            <a href="/settings" class="btn btn-sm btn-primary">My settings</a>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@if (Auth::user() === $user)
    @include('post.new')
@endif
@include('post.list')
@include('user.background')
@endsection
