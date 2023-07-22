<?php

use Illuminate\Support\Facades\Route;

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


Route::get('/', 'PostController@index')->name('posts.index');
Route::get('/posts/show/{id}', 'PostController@show')->name('posts.show');
Route::get('/posts/create', 'PostController@create')->name('posts.create');
Route::post('/posts', 'PostController@store')->name('posts.store');
Route::get('/posts/edit/{id}', 'PostController@edit')->name('posts.edit');
Route::patch('/posts/update/{id}', 'PostController@update')->name('posts.update');
Route::delete('/posts/destroy/{id}', 'PostController@destroy')->name('posts.destroy');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
