@extends('layouts.app')




@section('content')


@guest
    <div class="column has-text-weight-semibold" style="text-align: center;">{{$user->name}}'s profile</div>
    <hr>
    @if ($tweets->isEmpty())
        <h5 class="column">No Tweets here</h5>
    @else
        <ul class="navbar" >
            <li class="navbar-item"><h5>{{$user->name}}'s tweets</h5></li>
            @foreach ($tweets as $tweet)
                <li class="navbar-item">{{$tweet->content}}</li>
            @endforeach
        </ul>
@endif
@else
    <div class="column - has-text-danger has-text-weight-semibold" style="text-align: center;">Your profile {{$user->name}}</div>
    <br>
    <div class="card message is-primary ">
        <div class="card message is-primary"><br>
            <div class="has-text-weight-semibold has-text-primary"> Username: <strong>{{$user->name}}</strong></div>
            <div class="has-text-weight-semibold has-text-primary"> Email: <strong> {{$user->email}}</strong></div> <br>
        </div>

            @if ($user == Auth::user())
                <form action='/profile/editEmail' method='POST'>
                    @csrf
                    <input type='hidden' name='id' value='{{$user->id}}'>
                    <div class="field">
                        <p class="control has-icons-left has-icons-right">
                        <input class="input is-focused" type= "email" name="email" id="email" placeholder="New Email">
                        <span class="icon is-small is-left"> <i class="fas fa-envelope"></i>
                        </span> </p>
                    </div>
                    @error('email') {{$message}} @enderror
                    <button class="button is-danger is-small" type='submit'>Update Email</button>
                </form>
                <br>
                <form action='/profile/editPassword' method='POST'>
                    @csrf
                    <input type='hidden' name='id' value='{{$user->id}}'>
                    <div class="field">
                        <p class="control has-icons-left">
                        <input class="input is-focused"  type="password" name="password" id="password" placeholder="New Password" required autocomplete="new-password">
                        <span class="icon is-small is-left">
                            <i class="fas fa-lock"></i>
                          </span> </p>
                    </div>
                    <div class="field">
                        <p class="control has-icons-left">
                        <input class="input is-focused" type="password" name="password_confirmation" id="password-confirm" placeholder="Confirm New Password" required autocomplete="new-password">
                        <span class="icon is-small is-left">
                            <i class="fas fa-lock"></i>
                          </span> </p>
                    </div>
                    @error('password') {{$message}} @enderror
                    <button class="button is-danger is-small" type='submit'>Update Password</button>
                </form>
            @endif
        </div>
    </div>

    @if ($follows->isEmpty())
        <a class="button is-danger is-small" role="button" href="/tweetFeed">Follow users</a>
    @else
        <ul class="list-item">
            <li class="list-item is-active has-background-danger"><h5>You are following</h5></li>
            @foreach ($follows as $follow)
                    <li class="list-item">{{$follow->followed_id}}</li>
            @endforeach
        </ul>
    @endif
    <hr>
    @if ($tweets->isEmpty())
        <a class="button is-danger is-small" role="button" href="/tweetFeed">Go tweet yourself!</a>
    @else
        <ul class="list-item">
            <li class="list-item is-active has-background-danger"><h5>Tweek your tweets</h5></li>
            @foreach ($tweets as $tweet)
                <li class="list-item">{{$tweet->content}}</li>
            @endforeach
        </ul>
    @endif
@endguest

@endsection
