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

Route::get('/', 'HomeController@index');


// profile
Route::post('/profile/followUser', 'UserController@followUser');
Route::post('/profile/unfollowUser', 'UserController@unfollowUser');
Route::get('/profile/show/{id}', 'UserController@showProfile');
Route::post('/profile/editEmail', 'UserController@editEmail');
Route::post('/profile/editPassword', 'UserController@editPassword');


// Tweet Feed
Route::get('/tweetFeed', 'FeedController@showAll');
Route::get('/tweet/addTweet', 'FeedController@newTweet');
Route::get('/tweet/showTweet', 'FeedController@showTweet');
Route::post('/tweet/editTweet', 'FeedController@editTweet');
Route::post('/tweet/deleteTweet', 'FeedController@showDeleteQuestion');
Route::get('/tweet/deleteTweet/yes', 'FeedController@deleteTweet');

//delete

Route::post('/profile/deleteUser', 'UserController@ConfirmDelete');
Route::post('/profile/delete/confirm', 'UserController@deleteProfile');

//Comments
Route::post('/comment/addComment', 'FeedController@newComment');
Route::post('/comment/deleteComment', 'FeedController@deleteComment');
Route::post('/comment/showComment', 'FeedController@showComment');
Route::post('/comment/editComment', 'FeedController@editComment');

//Like endpoints
Route::post('like/likeTweet', 'FeedController@likeTweet');
Route::post('like/unlikeTweet', 'FeedController@unlikeTweet');

