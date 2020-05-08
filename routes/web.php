<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/posts', function () {
    $posts = DB::select('select * from posts');
    return view('posts.index', [
        'posts' => $posts
    ]);
});

Route::get('/posts/create', function () {
    return view('posts.create');
});

Route::post('posts/store', function (Request $request) {
    DB::insert('insert into posts (title, content) values (?, ?)', [
        $request->input('title'),
        $request->input('content')
    ]);
    return view('posts.index');
});
