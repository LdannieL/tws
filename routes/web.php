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

// Route::group(array('prefix' => 'admin', 'middleware' => 'auth'), function(){
// 	Route::resource("posts","AdminPostController");
// });
Route::group(array('prefix' => 'admin'), function(){
	Route::resource("posts","AdminPostController",['as' => 'admin']); //to have admin in name like admin.posts.index
});
// Route::resource("admin.posts","AdminPostController");

Auth::routes();
// Route::controllers([
// 	'auth' => 'Auth\AuthController',
// 	'password' => 'Auth\PasswordController',
// ]);

Route::get('/', array('as' => 'home', 'uses' => 'PostsController@index'));
// Route::get('post/{id}', array('as' => 'post', 'uses' => 'PostsController@show'))->where('id', '[1-9][0-9]*');
Route::get('post/{id}', 'PostsController@show')->name('post')->where('id', '[1-9][0-9]*');
Route::get('/home', array('as' => 'dashboard', 'uses' => 'HomeController@index'));
