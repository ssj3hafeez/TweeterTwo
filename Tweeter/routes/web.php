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

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/profile', 'UserController@show');
Route::post('/profile/post', 'UserController@newTweet');

Route::get('/profile/edit/', 'UserController@editTweet');
Route::post('/profile/update-edit/', 'UserController@updateTweet');
Route::post('/profile/delete', 'UserController@deleteTweet');


Route::get('/NewsFeed', 'FeedController@showTweets');
Route::post('/NewsFeed', 'FeedController@showTweets');
Route::post('deleteComment', 'FeedController@deleteComment'); //is deleting a comment
Route::post('/postComment','FeedController@postComment'); //showing edit form

Route::post('NewsFeed/update-Comment','FeedController@updateComment'); //update comment
