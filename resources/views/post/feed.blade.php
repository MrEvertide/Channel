@foreach(Auth::user()->getFriendsPosts() as $post)
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        {{ $post->getUser($post->user_id)->name }}
                    </div>
                    <div class="panel-body">
                        {{$post->content}}
                    </div>
                    <div class="panel-footer" title="{{$post->parseDate($post->created_at)}}">
                        {{$post->parseDateShort($post->created_at)}}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endforeach
