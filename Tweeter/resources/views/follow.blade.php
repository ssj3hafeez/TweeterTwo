@extends('layouts.app')

@section('content')

@foreach ($users as $user)
<p><strong>{{ $user->name }}</strong></p>




@endforeach



@endsection

