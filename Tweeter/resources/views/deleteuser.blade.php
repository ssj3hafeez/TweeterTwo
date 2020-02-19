
@extends('layouts.app')

@section('content')
<div class="box message is-primary has-text-danger has-text-weight-bold title is-3">
        Delete profile {{Auth::user()->name}}
    <div class="box message is-primary">
        <form action='/profile/delete/confirm' method='post'>
            @csrf
            <div class="field is-grouped">
                <button class="button is-danger is-small" type='submit' name='id' value='{{Auth::user()->id}}'>YES </button>
            </div>
        </form>
        <br>
        <form action='/profile/show/{{{Auth::user()->id}}}' method='get'>
            @csrf
            <div class="form-group">
                <button class="button is-danger is-small" type='submit'name='id' value='{{Auth::user()->id}}'>Nevermind</button>
            </div>
        </form>
    </div>
</div>
@endsection
