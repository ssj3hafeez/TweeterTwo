@extends('layouts.app')

@section('content')
<div class="columns">
    <div class="column">
        <div class="columns">
            <div class="column">

                <h1 class= "title is-2 - has-text-danger is-capitalize has-text-weight-bold" style="text-align: center;"> TWEEK OR TWEET </h1>

                <div style="text-align: center;">
                <img  class="center" width="200" height="100" src="{{ asset('/image/bird.png') }}">
                </div> <br>

                <div class="has-text-danger" style="text-align: center;"><b>{{ __('Login to Tweeter') }}</b></div>
                <br>
                <div class="box message is-primary">
                    <div class="box text-align: center;">
                    <form class="navbar-item" method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="column">
                          <b><label for="email" class="has-text-danger">{{ __('E-Mail') }}</label></b>

                            <div class="column">
                                <input class="input is-focused" id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="navbar-item">
                          <b><label for="password" class="- has-text-danger">{{ __('Password') }}</label></b>
                        </div>
                            <div class="column">
                                <input class="input is-focused"  id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                </div>

                        <div class="column">
                            <div class="columns">
                                <div class="field">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label - has-text-danger" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="column">
                            <div class="column">
                                <button type="submit" class="button is-danger is-medium " style="text-align: center;">
                                    {{ __('Login') }}
                                </button>
                                <br>
                                <br>
                                @if (Route::has('password.request'))
                                  <b> <a  class="- has-text-danger" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }} </a> </b>
                                @endif
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


@endsection
