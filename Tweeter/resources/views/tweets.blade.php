
@extends('layouts.app')

@section('content')
    @guest
        <p>Please Login to see Tweets</p>
    @else
        <h1>Welcome {{ Auth::user()->name }}</h1>
        <br><br>
        <div style="margin-left: 10vw">
        @foreach ($tweets as $tweet)
                <p><strong>{{ $tweet->author }}</strong></p>
                <div style="width: 75vw;">
                    <p style="word-break: break-all;">{{$tweet->content}}</p>
                </div>
                <br>

                @if ( Auth::user()->name == $tweet->author)
                <form action="/tweets/edit" method="GET">
                    @csrf
                    <button type="submit" name="edit" value="{{$tweet->id}}" >Edit Tweet </button>
                </form>
            @endif
            <br>

                @if ( Auth::user()->name == $tweet->author)
                    <form action="/tweets/delete" method="post">
                        @csrf
                        <button type="submit" name="delete" value="{{$tweet->id}}" >Delete Tweet</button>
                    </form>
                    <br>
                @endif
            @endforeach
         <br>
        </div>
        <div style="margin-left: 25vw">
            <form action="/tweets/post" method="post">
                @csrf
                <input type="hidden" name="author" value="{{ Auth::user()->name }}">
                <textarea name="content" value="Content" style="width: 50vw; height: 20vh; display: block; resize: none;"></textarea>
                <input type="submit" name ="post" value="Create Tweet">
            </form>
        </div>
    @endguest
@endsection

