@extends('layouts.app')

@php

    function checkFollowing($userToCheck, $follows) {
        foreach ($follows as $follow) {
            if($follow->followed_id == $userToCheck) {
                return true;
            }
        }
        return false;
    }

@endphp


@section('content')

@foreach ($users as $user)
<p><strong>{{ $user->name }}</strong></p>
@if(checkFollowing ($user->id, Auth::user()->follows))
<p>Already Following!</p>
@csrf
<form action="/follow/" method="get">
    @csrf
    <button type="submit" name="unfollow_id" value="{{$user->id}}" >Unfollow</button> <br>
</form>

@else
<form action="/follow/users/" method="post">
    @csrf
    <button type="submit" name="follow_id" value="{{$user->id}}" >Follow</button> <br>
</form>
<br>

@endif
@endforeach
@endsection

