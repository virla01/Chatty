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

/* home */
Route::get('/', [
    'uses' => '\Chatty\Http\Controllers\HomeController@index',
    'as' => 'home'
]);

/**
* Authentication
*/
Route::get('/signup',[
    'uses' => '\Chatty\Http\Controllers\Auth\AuthController@getSignup',
    'as' => 'auth.signup',
    // 'middleware' => ['auth'],
]);

Route::post('/signup',[
    'uses' => '\Chatty\Http\Controllers\Auth\AuthController@postSignup',
    // 'middleware' => ['auth'],
]);

Route::get('/signin',[
    'uses' => '\Chatty\Http\Controllers\Auth\AuthController@getSignin',
    'as' => 'auth.signin',
    // 'middleware' => ['auth'],
]);

Route::post('/signin',[
    'uses' => '\Chatty\Http\Controllers\Auth\AuthController@postSignin',
    // 'middleware' => ['auth'],
]);

Route::get('/signout',[
    'uses' => '\Chatty\Http\Controllers\Auth\AuthController@getSignout',
    'as' => 'auth.signout',
]);

/**
* Search
*/
Route::get('/search',[
    'uses' => '\Chatty\Http\Controllers\SearchController@getResults',
    'as' => 'search.results',
]);

/**
* User profile
*/
Route::get('/user/{username}',[
    'uses' => '\Chatty\Http\Controllers\User\ProfileController@getProfile',
    'as' => 'profile.index',
]);

Route::get('/profile/edit',[
    'uses' => '\Chatty\Http\Controllers\User\ProfileController@getEdit',
    'as' => 'profile.edit',
    //'middleware' => ['auth'],
]);

Route::post('/profile/edit',[
    'uses' => '\Chatty\Http\Controllers\User\ProfileController@postEdit',
    //'middleware' => ['auth'],
]);

/**
* Friends
*/
Route::get('/friends',[
    'uses' => '\Chatty\Http\Controllers\Friend\FriendController@getIndex',
    'as' => 'friend.index',
    //'middleware' => ['auth'],
]);

Route::get('/friends/add/{username}',[
    'uses' => '\Chatty\Http\Controllers\Friend\FriendController@getAdd',
    'as' => 'friend.add',
    //'middleware' => ['auth'],
]);

Route::get('/friends/accept/{username}',[
    'uses' => '\Chatty\Http\Controllers\Friend\FriendController@getAccept',
    'as' => 'friend.accept',
    //'middleware' => ['auth'],
]);

Route::post('/friends/delete/{username}',[
    'uses' => '\Chatty\Http\Controllers\Friend\FriendController@postDelete',
    'as' => 'friend.delete',
    //'middleware' => ['auth'],
]);


/**
* Statuses
*/
Route::post('/status', [
    'uses' => '\Chatty\Http\Controllers\Status\StatusController@postStatus',
    'as' => 'status.post',
    //'middleware' => ['auth'],
]);

Route::post('/status/{statusId}/reply', [
    'uses' => '\Chatty\Http\Controllers\Status\StatusController@postReply',
    'as' => 'status.reply',
    //'middleware' => ['auth'],
]);

Route::get('/status/{statusId}/like', [
    'uses' => '\Chatty\Http\Controllers\Status\StatusController@getLike',
    'as' => 'status.like',
    //'middleware' => ['auth'],
]);
