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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::group(['middleware' => ['auth']], function () {
    Route::get('/home', 'HomeController@index')->name('home');
    Route::resource('categories', 'CategoryController');
    Route::resource('posts', 'PostController');
    Route::get('/trashed_posts', 'PostController@trashed')->name('posts.trashed');
    Route::get('/restore/{id}', 'PostController@restore')->name('posts.restore');
});
