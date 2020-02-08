<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Db;

class FeedController extends Controller
{
   function showTweets() {
    if (Auth::check()) {
        $result = \App\Tweets::all();
        return view('/NewsFeed',['tweets'=>$result]);}
    }


    function postComment(Request $request ){
        $user = Auth::user();
        if (Auth::check()) {
        $comment = new \App\Comments;
        $comment->content = $request->content;

        $result = \App\Comments::all();
        return view('NewsFeed', ['comments' => $result]);
    }

    }

    function updateComment(Request $request){
        $id = $request->tweets_id;  //the submit button is called id from editTweet view page
        if(Auth::check()) {
        $comment = \App\Comments::find($id);
        $comment->content = $request->content;
        $comment->save();

        return redirect('/NewsFeed');

    }


}




}


