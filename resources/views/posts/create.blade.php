@extends('layouts.app')

@section('content')
<div class="content">
    <h1>Create a New Post Below...</h1>
</div>
<div class="box">
    <form action="{{ route('posts.store') }}" method="post">
        @csrf
        <div class="field">
            <label class="label" for="title">The Post's Title:</label>
            <div class="control">
                <input class="input @error('title') is-danger @enderror" type="text" name="title" id="post-title"
                    placeholder="Enter a title..." value="{{ old('title') }}">
                @error ('title')
                <p class="help is-danger">{{ $errors->first('title') }}</p>
                @enderror
            </div>
        </div>

        <div class="field">
            <label class="label" for="content">The Post's Content:</label>
            <div class="control">
                <textarea class="textarea @error('content') is-danger @enderror" name="content" id="post-content"
                    cols="30" rows="10" placeholder="Enter some content...">{{ old('content') }}</textarea>
                @error('content')
                <p class="help is-danger">{{ $errors->first('content') }}</p>
                @enderror
            </div>
        </div>

        <div class="field">
            <label class="label" for="tag-select">Tags</label>
            <div class="control">
                <div class="select is-multiple">
                    <select name='tags[]' id="tag-select" multiple>
                        <option value="">--Select a Tag--</option>
                        @foreach ($tags as $tag)
                        <option value={{ $tag->id }}>{{ $tag->name }}</option>
                        @endforeach
                    </select>
                </div>
                @error('tags')
                    <p class="help is-danger">{{ $errors->first('tags') }}</p>
                @enderror
            </div>
        </div>

        <br>

        <div class="field">
            <div class="control">
                <input class="button is-link" type="submit" value="Create a Post">
            </div>
        </div>
    </form>
</div>
@endsection
