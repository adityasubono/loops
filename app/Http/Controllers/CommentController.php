<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\User;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            $cek_user = User::where('name',$request->Input(['name']))->where('email',$request->Input(['email']))->first();

            if (empty($cek_user)) {
                $comment = new Comment();
                $comment->post_id = $request->Input(['post_id']);
                $comment->name = "Guest";
                $comment->email = ' - ';
                if(empty($request->Input(['website']))){
                    $comment->website = ' - ';
                } else {
                    $comment->website = $request->Input(['website']);
                }
                $comment->comment = $request->Input(['comment']);
                $comment->save();

            }else {
                $comment = new Comment();
                $comment->post_id = $request->Input(['post_id']);
                $comment->name = $request->Input(['name']);
                $comment->email = $request->Input(['email']);
                if(empty($request->Input(['website']))){
                    $comment->website = ' - ';
                } else {
                    $comment->website = $request->Input(['website']);
                }
                $comment->comment = $request->Input(['comment']);
                $comment->save();
            }
            return redirect('/detail-post/'.$request->slug)->with('success', 'Data Comment Berhasil Disimpan');

        } catch (\Exception $e) {
            return redirect('/detail-post/'.$request->slug)->with('error', 'Data Comment Gagal Disimpan');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
