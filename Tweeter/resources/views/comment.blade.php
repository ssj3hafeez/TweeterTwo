
@extends('layouts.app')
@section('content')

<h4>Tweek Your Comment</h4>
<h3 class=" has-text-danger">{{$comment->content}}</h3>
<div class ="box">
    <form action='/comment/editComment' method='POST'>
        @csrf
        <input type='hidden' name='author' value='{{Auth::user()->id}}'>
            <textarea class="input is-focused" id='content' cols='100' name='content'>{{$comment->content}}</textarea>
            <br>
            <div class="field is-grouped">
            <p class="control"><br>
            <button class="button is-danger is-outlined is-small" name='id' value='{{$comment->id}}' type='submit'>Save comment</button>
            </p>

    </form>
    <form action='/tweetFeed' method='get'>
        <p class="control"><br>
        @csrf
        <button class="button is-danger is-outlined is-small" type='submit'>Go back</button>
        </p>
    </form>
    </div>
</div>
@endsection
