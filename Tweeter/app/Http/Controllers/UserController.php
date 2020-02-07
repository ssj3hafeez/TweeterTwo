<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
Use Auth;
Use Db;

class UserController extends Controller
{
    function show(){
        if (Auth::check()) {
            $result = \App\Tweets::all();
            return view('/profile',['tweets'=>$result]);
        } else {
            return view('/profile');
        }

    }
    function showtweet($id){
        $tweet = \App\Tweets::find($id);
        return view('viewPost', ['tweets' => $tweet]);
    }


    function newTweet(Request $request ){
        $user = Auth::user();
            if (Auth::check()) {
            $tweet = new \App\Tweets;
            $tweet->author = $request->author;
            $tweet->content = $request->content;
            $tweet->user_id = $user->id;
            $tweet->save();

            $result = \App\Tweets::all();
            return view('profile', ['tweets' => $result]);
        } else {
            return view('profile');
        }

    }

  //destroy Tweet
    function deleteTweet(Request $request){
    $id  = $request->delete;   //key is the name not the value
    if(Auth::check()) {
    $tweet= \App\Tweets::find($id);
    $tweet->delete();
    return redirect ('/profile');
  }

    }


    public function editTweet(Request $request){
    $id = $request->edit;
    if(Auth::check()) {
    $tweet = \App\Tweets::find($id);
    return view('/editTweet', ['tweets' => $tweet]);

    }

}

}
