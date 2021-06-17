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
Auth::routes();

//Route::get('/', function () {
//  return view('posts/index');
//});
// Route::get('/home', 'HomeController@index')->name('home');
//ログアウト中のページ
Route::get('/login', 'Auth\LoginController@login')->name('login');
Route::post('/login', 'Auth\LoginController@login');

Route::get('/register', 'Auth\RegisterController@register');
Route::post('/register', 'Auth\RegisterController@register');

Route::get('/added', 'Auth\RegisterController@added');


//ログイン中のページ
Route::get('/', 'PostsController@index')->name('posts.index');

Route::get('/profile', 'UsersController@profile');

Route::get('/search', 'UsersController@index');

//Route::get('/follow-list', 'PostsController@index');
//Route::get('/follower-list', 'PostsController@index');

Route::get('/logout', 'Auth\LoginController@logout');

Route::post('post/create', 'PostsController@create');

Route::get('post/{id}/update-form', 'PostsController@updateForm');
Route::post('/post/update', 'PostsController@update');
Route::get('/post/{id}/delete', 'PostsController@delete');
