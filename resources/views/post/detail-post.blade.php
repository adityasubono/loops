@extends('layouts/main')

@section('title', 'View Post')

@section('container-fluid')
    @if (session('success'))
        <div class="alert alert-success" id="alert">
            {{ session('success') }}
        </div>
    @endif

    @if (session('error'))
        <div class="alert alert-danger" id="alert">
            {{ session('error') }}
        </div>
    @endif

    @foreach($post as $data)
        <div class="blog-post">
            <h2 class="blog-post-title">{{$data->title}}</h2>
            <p class="blog-post-meta">by <a href="#">{{$data->name}} ({{$data->email}} )</a></p>

            <p class="text-justify">{{$data->content}}</p>
        </div><!-- /.blog-post -->
    @endforeach


    <div class="my-3 p-3 bg-white rounded shadow-sm">
        <h6 class="border-bottom border-gray pb-2 mb-0">Recent Comment</h6>
        @foreach( $comments_aku as $comment )
            <div class="media text-muted pt-3">
                @if($comment->name == "Guest")
                <svg class="bd-placeholder-img mr-2 rounded"
                     width="32" height="32"
                     xmlns="http://www.w3.org/2000/svg"
                     preserveAspectRatio="xMidYMid slice"
                     focusable="false" role="img" aria-label="Placeholder: 32x32">
                    <title>{{$comment->name}}</title>
                    <rect width="100%" height="100%" fill="#ffc0cb"/>
                    <text x="50%" y="50%" fill="#ffc0cb" dy=".3em">32x32</text>
                </svg>
                @else

                    <svg class="bd-placeholder-img mr-2 rounded"
                         width="32" height="32"
                         xmlns="http://www.w3.org/2000/svg"
                         preserveAspectRatio="xMidYMid slice"
                         focusable="false" role="img" aria-label="Placeholder: 32x32">
                        <title>{{$comment->name}}</title>
                        <rect width="100%" height="100%" fill="#007bff"/>
                        <text x="50%" y="50%" fill="#007bff" dy=".3em">32x32</text>
                    </svg>

                @endif
                <p class="media-body pb-3 mb-0 small lh-125 border-bottom border-gray">
                    <strong class="d-block text-gray-dark">{{$comment->name}} | {{$comment->email}}</strong>
                   {{$comment->comment}}
                </p>
            </div>
        @endforeach
    </div>

    <div class="card">
        <h5 class="card-header">#Comment Post</h5>
        <div class="card-body">
            <form action="/comment-save" method="post">
                @csrf
                @foreach( $post as $data )
                    <div class="form-group">
                        <input type="hidden" class="form-control" id="name" name="name" value="{{Session::get('name')}}">
                        <input type="hidden" class="form-control" id="email" name="email" value="{{Session::get('email')}}">
                        <input type="hidden" name="slug" id="slug" value="{{$data->slug}}">
                        <input type="hidden" name="post_id" id="post_id" value="{{$data->post_id}}">
                    </div>
                    <div class="form-group">
                        <label for="website">Website</label>
                        <input type="text" class="form-control" id="website" name="website">
                    </div>
                    <div class="form-group">
                        <label for="comment">Comment</label>
                        <textarea class="form-control" name="comment" id="comment" rows="5"></textarea>
                    </div>

                    <button type="submit" class="btn btn-primary">Submit</button>
                @endforeach
            </form>
        </div>
    </div>
    <script type="text/javascript">
        window.setTimeout(function () {
            $("#alert").fadeTo(500, 0).slideUp(500, function () {
                $(this).remove();
            });
        }, 4000);
    </script>

@endsection
