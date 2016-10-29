@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-5">
            <div class="panel panel-default">
                <div class="panel-heading">Write a post</div>
                <div class="panel-body">
                    <form enctype="multipart/form-data" action="/post/new" method="POST" class="avatar-form">
                        <label for="avatar">Write a message.</label>
                        <textarea name="content"></textarea>
                        <input type="hidden" name="_token" value="{{csrf_token()}}">
                        <button type="submit" class="pull-right btn btn-sm btn-primary">Publish</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<style>
    body { background-image: url({{"/uploads/banner/" . Auth::user()->banner}}); }
</style>
@endsection
