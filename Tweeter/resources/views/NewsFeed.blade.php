@extends('layouts.app')

@section ('content')

@foreach ($comments as $comment)
    @if($comment['User_Id']!=Auth::user()->id)
    <p>{{$comment['author']}}</p>
   <p>{{$comment['content']}}</p> <br>
        <form action="/postComment" method="post">
            @csrf
            <button type="submit" name="tweet_id" >Comment</button>
        </form>


    @endif

@endforeach

 @endsection
