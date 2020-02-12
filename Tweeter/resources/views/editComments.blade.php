

@extends('layouts.app')
@section('content')

<h1> Edit Tweet </h1>

<h3>{{$comments->content}}</h3>

<form action= 'NewsFeed/update-Comment' method="POST">
    @csrf
<input type= "hidden" name="author" value="{{ Auth::user()->name }}">
<textarea name="content" value="{{$comments->content}}" style="width: 40vw; height: 20vh; display: block; resize: none;"></textarea>
<button name ="comment_id" type= "submit" value="{{$comments->id}}"> Edit Comments </button>
</form>
@endsection
