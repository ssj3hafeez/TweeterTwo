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
Route::get('/profile/tweets/{id}', 'UserController@showTweet');
Route::post('/profile/post', 'UserController@newTweet');
Route::get('/profile/edit/', 'UserController@editTweet');
Route::post('/profile/delete', 'UserController@deleteTweet');


Route::get('/feed','FeedController@NewsFeed');
Route::get('/feed/edit','FeedController@edit');
Route::get('/feed/delete', 'FeedController@edelete');

