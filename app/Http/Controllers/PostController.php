<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $post = Post::all();
        return view('post.list-post', compact('post'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        try {
            return view('post.create-post');
        } catch (\Exception $e) {
            return abort(404);
        }

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
//        try {
            $data = new Post;
            $data->user_id = $request->input('user_id');
            $data->title = $request->input('title');
            $data->content = $request->input('content');
            $data->save();

            return redirect('/list-post')->with('success', 'Data Post Berhasil Disimpan');

//        } catch (\Exception $e) {
//            return redirect('/create-post')->with('error', 'Data Post Gagal Disimpan');
//        }
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($user_id)
    {
        try {
            $post = DB::select('SELECT  posts.id as post_id, users.id as user_id, posts.* , users.*  FROM posts JOIN users ON posts.user_id = users.id  WHERE users.id =' . $user_id);

            return view('post.view-post', compact('post'));
        } catch (\Exception $e) {
            return redirect('/create-post')->with('error', 'Data Post Gagal Dimuat');
        }
    }

    public function detail($slug)
    {
        try {
            $post = DB::select("SELECT posts.id as post_id, users.id as user_id, posts.* , users.* FROM posts JOIN users ON posts.user_id = users.id  WHERE posts.slug ='$slug'");
//           dd($post);
            $comments_aku = Comment::where('post_id', $post[0]->post_id)->get();
//            dd($comments_aku);
            return view('post.detail-post', compact('post', 'comments_aku'));
        } catch (\Exception $e) {
            return redirect('/list-post')->with('error', 'Data Post Gagal Dimuat');
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::find($id);
        return view('post.edit-post', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        try {
            $data = Post::find($id);
            $data->title = $request->input('title');
            $data->content = $request->input('content');
            $data->save();

            return redirect('/list-post')->with('success', 'Data Post Berhasil Diupdate');

        } catch (\Exception $e) {
            return redirect('/create-post')->with('error', 'Data Post Gagal Diupdate');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            Post::where('id', $id)->delete();
            return redirect('/list-post')->with('success', 'Data Post Berhasil Dihapus');
        } catch (\Exception $e) {
            return redirect('/list-post')->with('error', 'Data Post Gagal Dihapus');
        }
    }
}
