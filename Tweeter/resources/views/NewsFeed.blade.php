@extends('layouts.app')
@section('content')

@foreach ($tweets as $tweet)
@if(Auth::user()->name == $tweet->author)
<p><strong>{{ $tweet->author }}</strong></p>
                <div style="width: 75vw;">
                    <p style="word-break: break-all;">{{$tweet->content}}</p>

                    <form action="/NewsFeed/Comment" method="post">
                    <textarea name = "content" value="Comment here" style="width: 40vw; height: 5vh; display: block; resize: none;"></textarea> <br>
                    <input type="submit" name ="comment_id" value="comment">
                </div>
                <br>
@php
$comments = $tweet->comments;
@endphp

@foreach($comments as $comment)
@if(Auth::user()->name == $tweet->author)
    <p>{{$comment['author']}}</p> <br>
   <p>{{$comment['content']}}</p> <br>
        <form action="/NewsFeed/Comment" method="post">
            @csrf

            <button type="submit" name="comment_id" value="{{$comment->id}}" >Comment</button> <br>
        </form>
<br>
    @endif
@endforeach


@endif
@endforeach
@endsection

