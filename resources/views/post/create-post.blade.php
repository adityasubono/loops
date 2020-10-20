@extends('layouts/main')

@section('title', 'Halaman Index')

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

    <div class="card">
        <h5 class="card-header bg-warning"># Create Post</h5>
        <div class="card-body">
            <form action="/store-post" method="post">
                @csrf
                <div class="form-group">
                    <label for="title">Title</label>
                    <input type="hidden" class="form-control" id="user_id" name="user_id" value="{{Session::get('id')}}">
                    <input type="text" class="form-control" id="title" name="title">
                </div>
                <div class="form-group">
                    <label for="content">Content</label>
                   <textarea id="content" name="content" class="form-control" rows="10"></textarea>
                </div>
                <button type="submit" class="btn btn-primary float-right">Submit</button>
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




