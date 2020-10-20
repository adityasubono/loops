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
        <h5 class="card-header bg-warning"># List Post</h5>
        <div class="card-body">
            <table class="table table-sm">
                <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Title</th>
                    <th scope="col">Slug</th>
                    <th scope="col">Content</th>
                    <th scope="col">Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach( $post as $data )
                    <tr>
                        <th scope="row">{{$loop->iteration}}</th>
                        <td>{{$data->title}}</td>
                        <td>{{$data->slug}}</td>
                        <td>{{ substr(strip_tags($data->content), 0, 50) }} ...</td>
                        <td>
                            <a href="/edit-post/{{$data->id}}" class="btn btn-warning mr-2">Edit</a>
                            <button type="button" class="btn btn-danger" data-toggle="modal"
                                    data-target="#delete{{$data->id}}">Delete
                            </button>

                            <form action="/delete-post/{{$data->id}}" method="post">
                                @csrf
                                @method('delete')
                                <div class="modal fade" id="delete{{$data->id}}" tabindex="-1" data-backdrop="static">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header bg-danger">
                                                <h5 class="modal-title text-white" id="exampleModalLabel">Delete</h5>
                                                <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                Apakah Anda Akan Menghapus Data Ini ?
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">
                                                    Close
                                                </button>
                                                <button type="submit" class="btn btn-primary">Delete</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
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




