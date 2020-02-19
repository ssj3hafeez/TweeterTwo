<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
Use Auth;
Use DB;

class UserController extends Controller
{

    function followUser(Request $request){
        if(Auth::check()){

        $follow = new \App\Follows;
        $follow->user_id = Auth::user()->id;
        $follow->followed_id = $request->name;
        $follow->save();
        return redirect('/tweetFeed');
        } else {
            return view('error');
       }
    }
    function unfollowUser(Request $request){
        if(Auth::check()){
            $follow_Acct = $request->name;
            $Acct_Match = ['user_id'=> Auth::user()->id, 'followed_id'=>  $follow_Acct];
            \App\Follows::where($Acct_Match)->delete();
             return redirect('/tweetFeed');
        } else {
            return view('error');
        }
    }
    function showProfile($id){
        if (\App\User::find($id)){
            $tweets = \App\Tweets::where('user_id', $id)->get();
            $user = \App\User::find($id);
            $follows = \App\Follows::where('user_id', $id)->get();
            return view('profile', ['tweets' => $tweets, 'user' => $user, 'follows' => $follows]);
            } else {
                return view('error');
            }
    }

    function editEmail(Request $request){
        if (Auth::check()){
            if(Auth::user()->id = $request->id){
                $request->validate([
                    'email' => 'required|unique:users'
                ]);
                $id = $request->id;
                $user = \App\user::find($id);
                $user->email = $request->email;
                $user->save();
                return redirect('/profile/show/'. $id);
            } else {
                return view('error');
            }
        } else {
            return view('error');
        }
    }
    function editPassword(Request $request){
        if (Auth::check()){
            if(Auth::user()->id = $request->id){
                $id = $request->id;
                $user = \App\user::find($id);
                $request->validate([
                    'password' => ['required', 'string', 'min:8', 'confirmed'],
                ]);
                $user->password = Hash::make($request->password);
                $user->save();
                return redirect('/profile/show/'. $id);
            } else {
                return view('error');
            }
        } else{
            return view('error');
        }
    }


    function ConfirmDelete(Request $request){
        if (Auth::user()->id == \App\User::find($request->id)->id){
            return view('deleteuser');
        } else {
            return view ('error');
        }
    }

    function deleteProfile(Request $request){
        if (Auth::user()->id == \App\User::find($request->id)->id){
            $id = $request->id;
            \App\Like::where('user_id', $id)->delete();
            \App\Follows::where('user_id', $id)->delete();
            \App\Comments::where('user_id', $id)->delete();
            \App\Tweets::where('user_id', $id)->delete();
            \App\User::destroy($id);
            return redirect('/');
        } else {
            return view('error');
        }


}

}







