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

Route::get('/', 'WelcomeController@index')->name('primary');
Route::get('/archive', 'WelcomeController@archive')->name('pages.archive');
Route::get('/contact', 'WelcomeController@contact')->name('pages.contact');

Auth::routes();

Route::group(['middleware' => ['auth']], function () {
    Route::get('/home', 'HomeController@index')->name('home');
    Route::resource('categories', 'CategoryController');
    Route::resource('tags', 'TagController');
    Route::resource('posts', 'PostController');
    Route::get('/trashed_posts', 'PostController@trashed')->name('posts.trashed');
    Route::get('/restore/{id}', 'PostController@restore')->name('posts.restore');
    Route::get('/users/{user}/profile', 'UserController@edit')->name('user.edit');
    Route::post('/users/{user}/profile', 'UserController@update')->name('user.update');
});
Route::group(['middleware' => ['auth', 'VerifyAdmin']], function () {
    Route::get('/dashboard', 'DashboardController@index')->name('dashboard');
    Route::get('/users/index', 'UserController@index')->name('users.index');
    Route::post('/users/{user}/admin_role', 'UserController@make_admin')->name('users.admin_role');
    Route::post('/users/{user}/writer_role', 'UserController@make_writer')->name('users.writer_role');
});
