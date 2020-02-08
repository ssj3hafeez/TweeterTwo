@extends('layouts.app')
@section('content')

<h1 class = "title" > Comment on Tweet </h1>

<h3>{{$tweets->comment}}</h3>

<form action= "/update-comment/" method="POST">
    @csrf
<input type= "hidden" name="author" value="{{ Auth::user()->name }}">
<textarea name="content" value="{{$tweets->content}}" style="width: 40vw; height: 20vh; display: block; resize: none;"></textarea>
<button name ="comment_id" type= "submit" value="{{$comment->id}}"> Edit Commment </button>
</form>
@endsection
