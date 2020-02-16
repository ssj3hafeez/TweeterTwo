<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Db;

class FeedController extends Controller
{ function showAll(){
    if (Auth::check()){
    $tweets = \App\Tweets::all()->sortBy('created_at')->reverse();
    $follows = \App\Follows::where('user_id', Auth::user()->id)->get();
    $comments = \App\Comments::all();
    $likes = \App\Like::where('user_id', Auth::user()->id)->get();
    return view('tweetFeed', ['tweets' => $tweets, 'follow' => $follows, 'comments' => $comments, 'likes' => $likes]);
    } else {
    $tweets = \App\Tweets::all();
    return view('tweetFeed', ['tweets' => $tweets]);
    }
}
function newTweet(Request $request){
    if (Auth::check()){
    $data = $request->validate([
        'content' => 'required|min:5|max:500'
    ]);
    $tweet = new \App\Tweets;
    $tweet->user_id = Auth::user()->id;
    $tweet->content = $request->content;
    $tweet->save();
    return redirect('/tweetFeed');
        } else {
            return view('error');
        }
}

function showTweet(Request $request){
    if (Auth::check()){
        if(Auth::user()->id == \App\Tweets::find($request->id)->user_id){
        $id = $request->id;
        $tweet = \App\Tweets::find($id);
        return view('tweet', ['tweets' => $tweet]);
        } else {
            return view('error');
        }
    } else {
        return view('error');
    }
}
function editTweet(Request $request){
        if (Auth::check()){
            if(Auth::user()->id == \App\Tweets::find($request->id)->user_id){
            $data = $request->validate([
                'content' => 'required|min:5|max:500'
            ]);
            $id =$request->id;
            $tweet = \App\Tweets::find($id);
            $tweet->user_id = Auth::user()->id;
            $tweet->content = $request->content;
            $tweet->save();
            return redirect('/tweetFeed');
        } else{
            return view('error');
        }
    } else {
        return view('error');
    }
}

function showDeleteQuestion(Request $request){
        if (Auth::check()){
            if (Auth::user()->id == \App\Tweets::find($request->id)->user_id){
                $id = $request->id;
                $tweet = \App\Tweets::find($id);
                return view('deleteTweet', ['tweet' => $tweet]);
            } else {
                return view('error');
            }
    } else {
        return view('error');
    }
}

function deleteTweet(Request $request){
    if (Auth::check()){
        if (Auth::user()->id == \App\Tweets::find($request->id)->user_id){
            $id = $request->id;
            \App\Tweets::destroy($id);
            \App\Comments::where('tweets_id', $id)->delete();
            return redirect('/tweetFeed');
        } else {
            return view('error');
        }
    } else {
        return view('error');
    }
}

function newComment(Request $request){
    if (Auth::check()){
        $comment = new \App\Comments;
        $comment->user_id = Auth::user()->id;
        $comment->tweets_id = $request->id;
        $comment->content = $request->content;
        $comment->save();
        return redirect('/tweetFeed');
    } else{
        return view('error');
    }
}
function deleteComment(Request $request){
    if (Auth::check()){
        $id = $request->id;
        if(Auth::user()->id == \App\Comments::find($id)->user_id){
            \App\Comments::destroy($id);
            return redirect('/tweetFeed');
        } else {
            return view('error');
        }
    } else {
        return view('error');
    }
}
function showComment(Request $request){
    if (Auth::check()){
        $id = $request->id;
        if(Auth::user()->id == \App\Comments::find($id)->user_id){
           $comment = \App\Comments::find($id);
           $tweets = \App\Comments::find($id)->tweet;
            return view('comment', ['comment' => $comment, 'tweets' => $tweets]);
        }
    }
}
function editComment(Request $request){
    if (Auth::check()){
        $id =$request->id;
        if(Auth::user()->id == \App\Comments::find($id)->user_id){
            $comment = \App\Comments::find($id);
            $comment->content = $request->content;
            $comment->save();
            return redirect('/tweetFeed');
        } else {
            return view('error');
        }
    } else {
    return view('error');
    }
}
function likeTweet(Request $request){
    if (Auth::check()){
        $like = new \App\Like;
        $like->user_id = Auth::user()->id;
        $like->tweets_id = $request->id;
        $like->save();
        return redirect('/tweetFeed');
    } else {
        return view('error');
    }
}
function unlikeTweet(Request $request){
    if (Auth::check()){
        $unlike = ['user_id'=> Auth::user()->id, 'tweets_id'=> $request->id];
        \App\Like::where($unlike)->delete();
        return redirect('/tweetFeed');
    } else {
        return view ('error');
    }
}
}





