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

Route::post('/posts', 'PostsController@store')->name('posts.store');

Route::get('/posts/{post}', 'PostsController@show')->name('posts.show');

Route::get('posts/{post}/edit', 'PostsController@edit')->name('posts.edit');

Route::patch('/posts/{post}', 'PostsController@update')->name('posts.update');

Route::delete('/posts/{post}', 'PostsController@destroy')->name('posts.destroy');
