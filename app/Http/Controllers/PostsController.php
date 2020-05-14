<?php

namespace App\Http\Controllers;

use App\Post;
use App\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PostsController extends Controller
{
    public function index()
    {
        if (request('tag')) {
            $posts = Tag::where('name', request('tag'))->firstOrFail()->posts;
        } else {
            $posts = Post::latest()->get();
        }

        return view('posts.index', [
            'posts' => $posts
        ]);
    }

    public function create()
    {
        return view('posts.create', [
            'tags' => Tag::all()
        ]);
    }

    public function store()
    {
        $this->validatePost();
        $post = new Post(request(['title', 'content']));
        $post->user_id = 1;
        $post->save();

        $post->tags()->attach(request('tags'));

        return redirect('/posts');
    }

    public function show(Post $post)
    {
        return view('posts.show', compact('post'));
    }

    public function edit(Post $post)
    {
        return view('posts.edit', compact('post'));
    }

    public function update(Post $post)
    {
        $post->update($this->validatePost());

        return redirect($post->path());
    }

    public function destroy($id)
    {
        $post = Post::find($id)->delete();

        return redirect('/posts');
    }

    protected function validatePost()
    {
        return request()->validate([
            'title' => 'required',
            'content' => 'required',
            'tags' => 'exists:tags,id'
        ]);
    }
}
