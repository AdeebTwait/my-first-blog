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

// Slugs
Route::get('/blog/{slug}', ['uses' => 'BlogController@getSingle', 'as' => 'blog.single'])->where('slug', '[\w\d\-\_]+');

// Pages
Route::get('/', 'PagesController@getIndex');
Route::get('/about', 'PagesController@getAbout');
Route::get('/contact', 'PagesController@getContact');
Route::post('/contact', 'PagesController@postContact');
Route::get('blog/{slug}', ['as' => 'blog.single', 'uses' => 'BlogController@getSingle'])->where('slug', '[\w\d\-\_]+');
Route::get('blog', ['uses' => 'BlogController@getIndex', 'as' => 'blog.index']);

Route::resource('posts', 'PostController');

// Cats & Tags
Route::resource('categories', 'CategoryController', ['except' => ['create']]);
Route::resource('tags', 'TagController', ['except' => ['create']]);

// Comments
Route::post('/comments/{post_id}', ['uses' => 'CommentController@store', 'as' => 'comment.store']);
Route::get('/comments/{post_id}', ['uses' => 'CommentController@delete', 'as' => 'comment.delete']);
Route::delete('comments/{id}', ['uses' => 'CommentController@destroy', 'as' => 'comment.destroy']);

// Auth
Auth::routes();
Route::get('/logout', 'Auth\LoginController@logout')->name('logout' );

// Home
Route::get('/home', 'HomeController@index')->name('home');
