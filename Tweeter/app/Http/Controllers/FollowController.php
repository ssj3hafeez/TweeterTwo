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

    function followuser(Request $request){
        $id = $request->follow_id;
        if(Auth::check()){
        $follow = new \App\Follows;
        $follow->users_id = Auth::user()->id;
        $follow->followed_id = $id;
        $follow->save();

        }
        return redirect('/follow');

    }






}

