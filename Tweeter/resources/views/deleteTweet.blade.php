@extends('layouts.app')

@section('content')
<div class=" has-text-danger">
    Are you sure you want to delete the following tweet?
</div>
<div class="box message is-primary">
    <div class="card-header-title has-text-danger">
        {{App\Tweets::find($tweet->id)->user->name}}
    </div>
        <p class="- has-text-primary - has-text-weight-bold">{{$tweet->content}}</p>
           <br>
        <form action='/tweet/deleteTweet/yes' method='get'>
            @csrf
            <div class="field is-grouped">
                <p class="control">

                <button class="button is-danger is-outlined is-small" type='submit' name='id' value='{{$tweet->id}}'>Absolutely</button>
                </p>
        </form>
        <form action='/tweet/showTweet' method='get'>
            @csrf
            <p class="control">
                <button class="button is-danger is-outlined is-small" type='submit'name='id' value='{{$tweet->id}}'>Abort</button>
            </div>
        </p>
        </form>
    </div>
    </div>
</div>
@endsection
