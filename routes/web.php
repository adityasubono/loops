<?php

use App\Http\Controllers\CommentController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/',[HomeController::class, 'index']);
Route::get('/member',[HomeController::class, 'member']);
Route::post('/logout',[HomeController::class, 'logout']);

Route::post('/register',[UserController::class, 'register']);
Route::post('/login',[UserController::class, 'login']);

Route::get('/list-post',[PostController::class, 'index']);
Route::get('/create-post',[PostController::class, 'create']);
Route::post('/store-post',[PostController::class, 'store']);
Route::get('/edit-post/{id}',[PostController::class, 'edit']);
Route::put('/update-post/{id}',[PostController::class, 'update']);
Route::delete('/delete-post/{id}',[PostController::class, 'destroy']);
Route::get('/view-post/{id}',[PostController::class, 'show']);
Route::get('/detail-post/{slug}',[PostController::class, 'detail']);

Route::post('/comment-save/',[CommentController::class, 'store']);
