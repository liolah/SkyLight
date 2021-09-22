<?php

use Illuminate\Support\Facades\Route;

use App\Mail\welcomeMail;  // For testing the welcome email

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

Route::get('/error/404/1', function () {
    return view('errors.404');
});

Route::get('/welcomeMail', function () {  // For testing the welcome email
    return new welcomeMail();
});


Auth::routes();

// Auth::routes(['verify' => true]);  // for the email verification

Route::get('/home', 'HomeController@index')->name('home');
Route::resource('users', 'UserController')->except('create', 'store');
Route::resource('posts', 'PostController')->only('store', 'update', 'destroy');

