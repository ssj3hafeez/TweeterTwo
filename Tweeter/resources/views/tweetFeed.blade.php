
@extends('layouts.app')

@php
    function checkUser($userToCheck, $follows){
        foreach ($follows as $check_User) {
            if($check_User->followed_id == $userToCheck){
                return true;
            }
        }
        return false;
    }
    function checkTweet($tweetToCheck, $likes){
        foreach($likes as $Liked_Tweet){
            if($Liked_Tweet->tweets_id == $tweetToCheck){
                return false;
            }
        } return true;
    }
@endphp

@section('content')

    @guest
    <div class= "column - has-text-danger "style="text-align: center;">
        Please login! Tweak your Tweet
    </div>
    <hr>
    <div class="column is-mobile is-centered">
        <div class="column">
            @foreach ($tweets as $tweet)
                <div class="card">
                    <div class="card - has-text-danger">
                        <p>{{$tweet->content}}</p>
                        <hr>
                        <h5><a href="/profile/show/{{{$tweet->user_id}}}">{{App\Tweets::find($tweet->id)->user->name}}</a></h5>
                    </div>
                </div>
            @endforeach
        </div>
    </div>


    @else
        <div>

       <b><div class="column - has-text-danger"  style="text-align: center;">
            You are logged in {{Auth::user()->name}}!
        </div></b>
        <hr>

        <div class="- has-text-danger has-text-weight-bold">New Tweet</div>
        <br>
        <form action="/tweet/addTweet" method="GET">
            @csrf
            <input class="form-control" type='hidden' name='name' value='{{Auth::user()->name}}'>
            <div class="form-group">
            <textarea class="textarea is-small is-focused" id='content' name='content' placeholder="Go ahead...Speak your truth">{{old('content')}}</textarea>
            </div><br>
            @if ($errors->any())
                @foreach ($errors->all() as $error)
                <div class="column - has-text-danger">
                    {{$error}}
                </div><br>
                @endforeach
            @endif
            <button class="button is-danger is-small"  name='id' value='{{Auth::user()->id}}'>Post Tweet</button>
        </form>
        <hr>

        <div class="card" style="margin: 2px">
            <div class="column message is-primary">
                @foreach ($tweets as $tweet)
                    <div class="card-container">
                        <div class="card-container">

                                  <figure name="image" class="image is-64x64">
                                    <img src="https://bulma.io/images/placeholders/128x128.png" alt="Image">
                                  </figure>

                            {{-- tweet and author--}}
                            <h5><a href="/profile/show/{{{$tweet->user_id}}}" class="- has-text-danger - has-text-weight-bold">{{App\Tweets::find($tweet->id)->user->name}}</a></h5>
                            <b><p class="has-text-primary">{{$tweet->content}}</p></b>
                            <p class="has-text-primary is-italic">{{$tweet->created_at->diffForHumans()}}</p>

                              {{--Edit Tweet only  when authorized--}}
                              @if (Auth::user()->id == $tweet->user_id)
                              <form class="card-container" action="/tweet/showTweet" method="get">
                                  <button class= "button is-small is-danger is-outlined"  type="submit" name='id' value='{{$tweet->id}}'> Modify Tweet</button>
                              </form>
                          @endif
                            {{--Follow/unfollow--}} <br>
                            @if (Auth::user()->id !== $tweet->user_id)
                                @if (checkUser(App\Tweets::find($tweet->id)->user->name, $follow))
                                    <form action="/profile/unfollowUser" method="POST"style="display:inline">
                                        @csrf
                                        <button class="button is-small is-danger is-outlined"   name='name' value='{{App\Tweets::find($tweet->id)->user->name}}'>Unfollow User</button>
                                    </form>
                                @else
                                    <form action="/profile/followUser" method="POST"style="display:inline">
                                        @csrf
                                        <button class="button is-small is-danger"  name='name' value='{{App\Tweets::find($tweet->id)->user->name}}'>Follow User</button>
                                    </form>
                                @endif
                            @endif
                            {{--Like function--}}
                            @if (checkTweet($tweet->id, $likes))
                                <form action="like/likeTweet" method="POST" style="display:inline">
                                    @csrf
                                    <button class="button is-small is-danger" name='id' value='{{$tweet->id}}'>Like</button>
                                </form>

                            @else
                                <form action="like/unlikeTweet" method="POST" style="display:inline">
                                    @csrf
                                    <button class="button is-small is-danger is-outlined"  name='id' value='{{$tweet->id}}'>Unlike</button>
                                </form> <br>
                                <hr>
                            @endif
                            {{--Show comments from tweet--}}
                            @foreach ($comments as $comment)
                                @if ($comment->tweets_id == $tweet->id)
                                    <div class="card-content">
                                        <p class="has-text-weight-semibold - has-text-danger">{{\App\Comments::find($comment->id)->user->name}}</p>
                                        <p class="has-text-weight-medium - has-text-primary">- {{$comment->content}}</p>
                                    {{--Edit comment it belongs to the logged in user--}}

                                        @if ($comment->user_id == Auth::user()->id)
                                            <form action="/comment/deleteComment" method="POST" style="display:inline">
                                                @csrf
                                                <button class="button is-small is-danger is-outlined"  name='id' value='{{$comment->id}}'>Delete Comment</button>
                                            </form>
                                            <form action="/comment/showComment" method="POST" style="display:inline">
                                                @csrf
                                                <button class="button is-small is-danger is-outlined"  name='id' value='{{$comment->id}}'>Edit Comment</button>
                                            </form>

                                        @endif

                                    </div>
                                @endif
                            @endforeach
                            {{--add comment to tweet--}}
                                <form class="Card" action="/comment/addComment" method="POST">
                                    @csrf
                                    <input type='hidden' name='user' value='{{Auth::user()->name}}'>
                                    <div class> <br>
                                        <textarea class="textarea is-focused is-small" placeholder="Comment here "rows="1" id='content' name='content'></textarea>
                                    </div><br>
                                    <button class="button is-danger is-small"  name='id' value='{{$tweet->id}}'>Comment</button>
                                </form>
                                <hr>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    @endguest

@endsection

