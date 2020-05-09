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

Route::get('/posts', 'PostsController@index')->name('posts.index');

Route::get('/posts/create', 'PostsController@create')->name('posts.create');

Route::post('/posts/store', 'PostsController@store')->name('posts.store');

Route::get('/posts/{id}', 'PostsController@show')->name('posts.show');

Route::delete('/posts/{id}', 'PostsController@delete')->name('posts.delete');
