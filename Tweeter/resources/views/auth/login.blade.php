@extends('layouts.app')

@section('content')
<div class="columns">
    <div class="column">
        <div class="columns">
            <div class="column">
                <div class="navbar-item" style="text-align: center;"><b>{{ __('Login to Tweeter') }}</b></div>
                <br>

                <div class="columns">
                    <div class="box is-mobile">
                    <form class="navbar-item" method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="column">
                          <b><label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label></b>

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
                          <b><label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label></b>
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
                <br>
                        <div class="column">
                            <div class="columns">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="column">
                            <div class="column">
                                <button type="submit" class="button is-danger is-large" style="text-align: center;">
                                    {{ __('Login') }}
                                </button>

                                @if (Route::has('password.request'))
                                  <b> <a  href="{{ route('password.request') }}">
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
