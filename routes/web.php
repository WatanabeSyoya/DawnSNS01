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

//ログイン
Auth::routes();
//Route::get('/login', 'Auth\LoginController@login')->name('login');
//Route::post('/login', 'Auth\LoginController@login');
//Route::get('/register', 'Auth\RegisterController@register');
//Route::post('/register', 'Auth\RegisterController@register');
Route::get('/added', 'Auth\RegisterController@added');
Route::get('/logout', 'Auth\LoginController@logout');

//投稿
Route::get('/', 'PostsController@index')->name('posts.index');
Route::post('post/create', 'PostsController@create');
Route::get('post/{id}/update-form', 'PostsController@updateForm');
Route::post('/post/update', 'PostsController@update');
Route::get('/post/{id}/delete', 'PostsController@delete');

//プロフィール
Route::get('/profile', 'UsersController@profile');

//検索
Route::get('/search', 'UsersController@search');
Route::post('/search', 'UsersController@search');

//フォロー機能
Route::get('/user/{id}/follow', 'UsersController@follow');
Route::get('/user/{id}/unfollow', 'UsersController@unfollow');

//フォローフォロワーリスト
Route::get('/follow-list', 'FollowsController@followList');
Route::get('/follower-list', 'FollowsController@followerList');

//ユーザー詳細
Route::get('/show', 'UsersController@show');
