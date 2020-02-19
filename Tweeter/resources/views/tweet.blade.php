@extends('layouts.app')
@section('content')

<div class="has-text-danger has-text-weight-bold">Tweek your Tweet </div>
<div class ="box message is-primary">
<form action='/tweet/editTweet' method='POST'>
    @csrf
    <input type='hidden' name='author' value='{{Auth::user()->id}}'>
    <div class="form-group">
        <div><textarea class="input is-focused" id='content' rows="5" name='content'>{{$tweets->content}}</textarea></div>
</form>
    <br>
    <div class="field is-grouped">
    <p class="control">
        <button class="button is-danger is-outlined is-small" name='id' value='{{$tweets->id}}' type='submit'>Modifiy Tweet</button>
    </p>
<form action='/tweet/deleteTweet' method='post'>
    @csrf
    <p class="control">
<button class="button is-danger is-outlined is-small" name='id' value='{{$tweets->id}}' type='submit'>Delete Tweet</button>
</p>
</form>
</div>
</div>

@if ($errors->any())
    @foreach ($errors->all() as $error)
        {{$error}}
    @endforeach
@endif
@endsection
