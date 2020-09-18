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
    return view('home');
})->name('afterlogin');

Auth::routes();

Route::view('/chat', 'chat.index')->name('chat')->middleware('auth');

Route::get('/chat/get-all', 'ChatController@index');
Route::post('/chat/store', 'ChatController@store');
Route::get('/{any?}', 'HomeController@index')->name('home');
