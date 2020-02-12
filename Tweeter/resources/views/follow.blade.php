@extends('layouts.app')

@section('content')

@foreach ($users as $user)
<p><strong>{{ $user->name }}</strong></p>

<form action="/follow/users/" method="post">
    @csrf
    <button type="submit" name="follow_id" value="{{$user->id}}" >Follow</button> <br>
</form>
<br>



@endforeach



@endsection

