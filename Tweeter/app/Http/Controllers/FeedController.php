<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Db;

class FeedController extends Controller
{
   function NewsFeed() {
       if(Auth::check()) {
           $users = \App\User::all();
           $follows = \App\Follows::where('follows', Auth::user()->name-get());
       } else {
           return redirect ('/home');
       }
   }
}
