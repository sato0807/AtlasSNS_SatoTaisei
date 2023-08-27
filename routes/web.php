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

// Route::get('/', function () {
  // return view('welcome');
// });
// Route::get('/home', 'HomeController@index')->name('home');

// Auth::routes();


//ログアウト中のページ
Route::get('/login', 'Auth\LoginController@login');
Route::post('/login', 'Auth\LoginController@login');

Route::get('/register', 'Auth\RegisterController@register');
Route::post('/register', 'Auth\RegisterController@validation');

Route::get('/added', 'Auth\RegisterController@added');
Route::post('/added', 'Auth\RegisterController@added');

//ログイン中のページ
Route::group(['middleware' => 'auth'], function () {
  Route::get('/top','PostsController@index');
  Route::post('/top','PostsController@store');
  Route::post('/top/update','PostsController@update');
  Route::get('/top/{id}/delete','PostsController@delete');

  Route::get('/profile','UsersController@profile');
  Route::post('/profile','UsersController@update');
  Route::get('/profile/{id}','UsersController@otherProfile');

  Route::get('/logout','Auth\LoginController@logout');

  Route::get('/follow-list','PostsController@followList');

  Route::get('/follower-list','PostsController@followerList');

  Route::get('/search','UsersController@search');
  Route::get('/search/{id}/follow','FollowsController@follow')->name('follow');
  Route::get('/search/{id}/unfollow','FollowsController@unfollow')->name('unfollow');

});
