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

    <div class="jumbotron p-4 p-md-5 text-white rounded bg-dark">
        <div class="col-md-6 px-0">
            <h1 class="display-4 font-italic">My Blog</h1>
        </div>
    </div>

    <div class="row mb-2">
        @foreach($post as $data)

        <div class="col-md-12">
            <div class="row no-gutters border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
                <div class="col p-4 d-flex flex-column position-static">
                    <h3 class="mb-0">{{$data->title}}</h3>
                    <div class="mb-1 text-muted">By {{$data->name}} ( {{$data->email}} )</div>
                    <p class="card-text mb-auto">{{ substr(strip_tags($data->content), 0, 250) }}</p>
                    <a href="/detail-post/{{$data->slug}}" class="stretched-link">Continue reading</a>
                </div>
                <div class="col-auto d-none d-lg-block">
                    <svg class="bd-placeholder-img" width="200" height="250" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid slice" focusable="false" role="img" aria-label="Placeholder: Thumbnail">
                        <title>Placeholder</title>
                        <rect width="100%" height="100%" fill="#55595c"/><text x="50%" y="50%" fill="#eceeef" dy=".3em">Thumbnail</text></svg>
                </div>
            </div>
        </div>
       @endforeach
    </div>



    <script type="text/javascript">
        window.setTimeout(function () {
            $("#alert").fadeTo(500, 0).slideUp(500, function () {
                $(this).remove();
            });
        }, 4000);
    </script>
@endsection
