@foreach($user->posts as $post)
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading" title="{{$post->parseDate($post->created_at)}}">
                        {{$post->parseDateShort($post->created_at)}}
                    </div>
                    <div class="panel-body">
                        {{$post->content}}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endforeach
