@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel-default panel panel-trans">
                <div class="panel-body">
                    <img src="/uploads/avatar/{{Auth::user()->picture}}" alt="profile picture" class="settings-avatar-image">
                    <div class="profile-image">
                        <h2>{{ucfirst(Auth::user()->name)}}'s Profile</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-5 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Change avatar</div>
                <div class="panel-body">
                    <form enctype="multipart/form-data" action="/settings/avatar" method="POST" class="avatar-form">
                        <label for="avatar">select a 300x300 file for better results.</label>
                        <input type="file" name="avatar">
                        <input type="hidden" name="_token" value="{{csrf_token()}}">
                        <button type="submit" class="pull-right btn btn-sm btn-primary">Upload avatar</button>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-5">
            <div class="panel panel-default">
                <div class="panel-heading">Change your banner</div>
                <div class="panel-body">
                    <form enctype="multipart/form-data" action="/settings/banner" method="POST" class="avatar-form">
                        <label for="avatar">select a 1920x1080 file for better results.</label>
                        <input type="file" name="banner">
                        <input type="hidden" name="_token" value="{{csrf_token()}}">
                        <button type="submit" class="pull-right btn btn-sm btn-primary">Upload banner</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<style>
    /**
     FIXME: find a better way to implement the profile background and avoid code duplication
     **/
    body {
        background-image: url({{"/uploads/banner/" . Auth::user()->banner}});
        background-size: cover;
        background-position: center center;
        background-repeat: no-repeat;
        background-attachment: fixed;
    }
</style>
@endsection
