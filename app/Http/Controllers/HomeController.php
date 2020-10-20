<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        $new_artikel = Post::orderBy('created_at','DESC')->first();

        $post = DB::select('SELECT  posts.id as post_id, users.id as user_id, posts.* , users.*  FROM posts JOIN users ON posts.user_id = users.id');
        return view('index', compact('post','new_artikel'));

    }

    public function member(Request $request)
    {
        try {
            if ($request->session()->has('id') &&
                $request->session()->has('name') &&
                $request->session()->has('email') &&
                $request->session()->has('login') == 'TRUE') {

                return redirect('/');
            }
        } catch (\Exception $e) {
            return abort(403);
        }
    }

    public function logout(Request $request)
    {
        try {
            $request->session()->forget('id');
            $request->session()->forget('name');
            $request->session()->forget('email');
            $request->session()->forget('login');

            return redirect('/')->with('success', 'Anda Berhasil Logout');

        } catch (\Exception $e) {
            return abort(403);
        }
    }
}
