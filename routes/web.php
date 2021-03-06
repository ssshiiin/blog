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

Route::delete('/posts/{post}', 'PostController@delete');

Route::get('/posts/search/title', 'PostController@searchTitle');

Route::get('/posts/search/period', 'PostController@searchPriod');

Route::post('/posts/{post}', 'PostController@update');

Route::post('/posts/create/{user}', 'PostController@store');

Route::get('/posts/create', 'PostController@create');

Route::get('/posts/{post}/edit', 'PostController@edit');

Route::get('/posts/{post}', 'PostController@show');

Route::get('/posts', 'PostController@index');

Route::get("/mypage/{user}", "PostController@mypage");

Route::get("/userpage/{user}", "PostController@userpage");

Route::post("/profile/{user}", "PostController@createProfile");

Route::get("/profile", "PostController@profile");


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
