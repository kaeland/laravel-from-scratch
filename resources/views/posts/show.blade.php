@extends('layouts.app')

@section('content')
<div class="content">
    <h1>{{ $post->title }}</h1>
    <p>
        {{ $post->content }}
    </p>

    <p>
        @foreach ($post->tags as $tag)
           Associated tags: <a href="{{ route('posts.index', ['tag' => $tag->name]) }}">{{ $tag->name }}</a>
        @endforeach
    </p>

    <a href="/posts">All Posts</a> |
    <a href="{{ route('posts.destroy', $post) }}" data-method="delete">Delete Post</a>
</div>
@endsection
