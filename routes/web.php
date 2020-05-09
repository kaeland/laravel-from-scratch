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
    $posts = DB::table('posts')->get();

    return view('posts.index', [
        'posts' => $posts
    ]);
})->name('posts.index');

Route::get('/posts/create', function () {
    return view('posts.create');
})->name('posts.create');

Route::post('/posts/store', function (Request $request) {
    DB::insert('insert into posts (title, content) values (?, ?)', [
        $request->input('title'),
        $request->input('content')
    ]);
    return redirect('posts.index');
})->name('posts.store');

Route::get('/posts/{id}', function (Request $request, $id) {
    $post = DB::table('posts')->find($id);

    return view('posts.show', [
        'post' => $post
    ]);
})->name('posts.show');

Route::delete('/posts/{id}', function (Request $request, $id) {
    DB::table('posts')
        ->where('id', $id)
        ->delete()->dd();
    return redirect('/posts');
})->name('posts.delete');
