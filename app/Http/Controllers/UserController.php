<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

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
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function register(Request $request)
    {
        try {
            User::create([
                'name' => $request['name'],
                'email' => $request['email'],
                'password' => Hash::make($request['password']),
            ]);
            return redirect('/')->with('success', 'Data Registrasi Berhasil Disimpan');

        } catch (\Exception $e) {
            return redirect('/')->with('error', 'Data Registrasi Gagal Disimpan');
        }
    }

    public function login(Request $request)
    {

        try {
            $email = $request->input('email');
            $password = $request->input('password');
            $data = User::where('email', $email)->first();
            if (Hash::check($password, $data->password)) {
                $request->session()->put('id', $data->id);
                $request->session()->put('name', $data->name);
                $request->session()->put('email', $data->email);
                $request->session()->put('login', TRUE);

                return redirect('/member')->with('success', 'Selamat Datang Di Blog Loops');
            } else {
                return redirect('/')->with('error', 'Email atau Password Salah');
            }
        } catch (\Exception $e) {
            return redirect('/')->with('error', 'Login Gagal');
        }
    }
}
