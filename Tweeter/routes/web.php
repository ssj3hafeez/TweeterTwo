<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();
// home page and login
Route::get('/home', 'HomeController@index')->name('home');


//edit, delete and create tweets
Route::get('/tweets', 'UserController@show');
Route::post('/tweets/post', 'UserController@newTweet');
Route::get('/tweets/edit/', 'UserController@editTweet');
Route::post('/tweets/update-edit/', 'UserController@updateTweet');
Route::post('/tweets/delete', 'UserController@deleteTweet');

// tweet feeds, create/edit/delete comments

Route::get('/NewsFeed', 'FeedController@showTweets');
// Route::post('/NewsFeed', 'FeedController@showTweets');
Route::post('/NewsFeed/deleteComment', 'FeedController@deleteComment'); //is deleting a comment
Route::post('/NewsFeed/Comment','FeedController@postComment'); //showing edit form

Route::get('/NewsFeed/update-Comment','FeedController@updateComment'); //update comment


Route::get('/follow', 'FollowController@followlist');
Route::post('/follow/users/','FollowController@followuser');
