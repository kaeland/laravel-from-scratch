<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PostsController extends Controller
{
    public function index()
    {
        $posts = DB::table('posts')->get();

        return view('posts.index', [
            'posts' => $posts
        ]);
    }

    public function create()
    {
        return view('posts.create');
    }

    public function store(Request $request)
    {
        DB::insert('insert into posts (title, content) values (?, ?)', [
            $request->input('title'),
            $request->input('content')
        ]);
        return redirect('posts/' . $request->input('id'));
    }

    public function show($id)
    {
        $post = DB::table('posts')->find($id);

        return view('posts.show', [
            'post' => $post
        ]);
    }

    public function delete($id)
    {
        DB::table('posts')
            ->where('id', $id)
            ->delete();
        return redirect('/posts');
    }
}
