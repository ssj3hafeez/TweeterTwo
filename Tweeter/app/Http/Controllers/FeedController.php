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
            return view('/NewsFeed',['tweets'=>$result]);
        } else {
            return view('/NewsFeed');
        }

    }



    function postComment(Request $request ){
        $user = Auth::user();
        if (Auth::check()) {
        $comments = new \App\Comments;
        $comments->content = $request->content;
        $comments->users_id = $user->id;
       //$comments->save();
        $Allcomments = \App\Comments::all();
        return view('/NewsFeed', ['comments' => $Allcomments]);
    }

    }

    function updateComment(Request $request){
        $id = $request->tweets_id;  //the submit button is called id from editTweet view page
        if(Auth::check()) {
        $comments = \App\Comments::find($id);
        $comments->content = $request->content;
        $comments->save();

        return redirect('/NewsFeed');

    }


}




}


