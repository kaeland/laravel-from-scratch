@extends('layouts.app')

@section('content')
<div class="content">
    <h1>{{ $post->title }}</h1>
    <p>
        {{ $post->content }}
    </p>
    <a href="/posts">All Posts</a> |
    <a href="{{ route('posts.delete', $post->id) }}" data-method="delete">Delete Post</a>
</div>
@endsection
