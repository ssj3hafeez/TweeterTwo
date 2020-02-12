<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
Use Auth;
class FollowController extends Controller
{
    function followlist(){
        if (Auth::check()) {
            $users= \App\User::all();
            return view('follow' ,['users'=>$users]);
        } else {
            return view('follow');
        }

    }
}
