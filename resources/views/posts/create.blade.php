@extends('layouts.app')

@section('content')
    <form action="/posts/store" method="post">
       @csrf
       <div class="field">
           <label class="label" for="title">The Post's Title:</label>
           <div class="control">
               <input class="input" type="text" name="title" id="post-title" placeholder="Enter a title...">
           </div>
       </div>

       <div class="field">
           <label class="label" for="content">The Post's Content:</label>
           <div class="control">
               <textarea class="textarea" name="content" id="post-content" cols="30" rows="10" placeholder="Enter some content..."></textarea>
           </div>
       </div>

       <div class="field">
           <div class="control">
               <input class="button is-link" type="submit" value="Create a Post">
           </div>
       </div>
    </form>
@endsection
