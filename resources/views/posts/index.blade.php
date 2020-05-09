@extends('layouts.app')

@section('content')
<div class="content">
    <h1>Checkout the Posts below</h1>

    <ul>
        @foreach ($posts as $post)
        <li>
            <a href="/posts/{{ $post->id }}">
                {{ $post->title }}
            </a>
        </li>
        @endforeach
    </ul>

    <a href="/posts/create">Create a New Post</a>
</div>
@endsection
