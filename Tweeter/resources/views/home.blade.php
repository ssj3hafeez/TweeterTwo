@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header-title" style="">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                   You are logged in!
<br>
<br>
</div>
</div>
                    <form action="/tweetFeed"  method="get">
                        <button type="submit" class="button is-danger is-large is-outlined is-fullwidth"> Enter Tweeter Feed </button>
                        </form>


        </div>
    </div>
</div>
@endsection
