@extends('layouts.app')

@section('content')
<div class="content">
    <h1>Edit Your Post Below...</h1>
</div>
<div class="box">
    <form action="{{ route('posts.update') }}}}" method="post">
        @csrf
        @method('PATCH')

        <div class="field">
            <label class="label" for="title">The Post's Title:</label>
            <div class="control">
                <input class="input" type="text" name="title" id="post-title" placeholder="Enter a title..." value="{{ $post->title }}">
            </div>
        </div>

        <div class="field">
            <label class="label" for="content">The Post's Content:</label>
            <div class="control">
                <textarea class="textarea" name="content" id="post-content" cols="30" rows="10"
                    placeholder="Enter some content...">{{ $post->content }}</textarea>
            </div>
        </div>

        <div class="field is-grouped">
            <div class="control">
                <input class="button is-link" type="submit" value="Create a Post">
            </div>
            <div class="control">
                <a href="{{ route('posts.index') }}" class="button is-link is-light">Return to Posts</a>
            </div>
        </div>
    </form>
</div>
@endsection
