@extends('layouts.app')

@section('content')
<div class="box">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card message is-primary">
                <div class="card-header-title is-centered message is-primary - has-text-danger subtitle is-3 ">{{ __('Register Account') }}</div>

                <div class="box message is-primary">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="field">
                            <label for="name" class="title is-7">{{ __('Name') }}</label>

                            <div class="field">
                                <input id="name" type="text" class="input is-focused"  @error('name') is-invalid @enderror name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="title is-7">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="input is-focused"  @error('email') is-invalid @enderror name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="title is-7">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="input is-focused"  @error('password') is-invalid @enderror name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="title is-7">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="input is-focused"  name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>
                        <br>
                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="button is-danger is-large">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
