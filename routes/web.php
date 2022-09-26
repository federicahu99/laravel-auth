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
    return view('guest.home');
});

Auth::routes(['register'=> false]);

Route::get('/admin', 'Admin\HomeController@index')->middleware('auth')->name('admin.home');

//amministrazione
Route::middleware('auth') //
    ->prefix('admin') //ulr iniziale
    ->namespace('Admin') //controller folder
    ->name('admin.') // aggiunge al nome
    ->group(function () {

    // Admin
    Route::get('/', 'HomeController@index')->name('home');

    // Posts
    // Route::resource('posts','PostController');
});