<div class="nav-scroller py-1 mb-2">
    @if(Session::get('login'))
        <nav class="nav d-flex text-left">
            <a class="btn btn-success mr-3" href="/">View All</a>
            <a class="btn btn-primary mr-3" href="/view-post/{{Session::get('id')}}">View Post</a>
            <a class="btn btn-primary mr-3" href="/list-post">List Post</a>
            <a class="btn btn-primary " href="/create-post">Create Post</a>
        </nav>
    @else
        <nav class="nav d-flex text-left">
            <a class="p-2 text-muted" href="/">Home |</a>
            @foreach($post as $data_post)
                <a class="p-2 text-muted" href="/detail-post/{{$data->slug}}">{{$data->title}} |</a>
            @endforeach
        </nav>
    @endif
</div>
