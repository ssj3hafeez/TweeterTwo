@extends('layouts.app')

@section('content')
<div class="box message is-primary">
    <div class="row justify-content-center">
        <div class="box">



                <div class="card - has-text-danger - has-text-weight-bold has-text-centered">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                   You are logged in!
<br>
<br>
</div>

                    <form action="/tweetFeed"  method="get">
                        <button type="submit" class="button is-danger is-large is-outlined is-fullwidth"> Enter Tweeter Feed </button>
                        </form>


        </div>
    </div>
</div>
@endsection
