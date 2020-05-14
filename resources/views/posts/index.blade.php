@extends('layouts.app')

@section('content')
<div class="content">
    <h1>Checkout the Posts below</h1>

    <ul>
        @forelse ($posts as $post)
        <li>
            <a href="{{ $post->path() }}">
                {{ $post->title }}
            </a> |
            <a href="{{ route('posts.edit', $post) }}">Edit</a>
        </li>
        @empty
        <p>No relavant posts to display.</p>
        @endforelse
    </ul>

    <a href="/posts/create">Create a New Post</a>
</div>
@endsection
