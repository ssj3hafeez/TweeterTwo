@extends('layouts.app')

@section ('content')

    <form action="editComment" method="post">
        @csrf
        <input type="text" name="comment" value="{{$comment->content}}">
        <button type="submit" name="comment_id" value="{{$comment->id}}">Edit</button>
    </form>

@endsection
