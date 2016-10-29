<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Write a post</div>
                <div class="panel-body">
                    <form enctype="multipart/form-data" action="/post/new" method="POST" class="avatar-form">
                        <textarea class="fullwidth-textarea" name="content"></textarea>
                        <input type="hidden" name="_token" value="{{csrf_token()}}">
                        <button type="submit" id="sendPost" class="hidden btn btn-sm btn-primary">Publish</button>
                    </form>
                </div>
                <div class="panel-footer" style="height: 50px">
                    <label for="sendPost" class="btn btn-sm btn-primary pull-right">Publish</label>
                </div>
            </div>
        </div>
    </div>
</div>