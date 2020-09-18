<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/


// dapat diakses tanpa login
Route::get('book', 'BookController@index');
Route::get('book/{book}', 'BookController@show');

// nanti di grup ke dalem middleware auth (login)
Route::middleware('auth')->group(function () {
    Route::get('user', 'UserController@show');
    Route::patch('user/{user}', 'UserController@update');

    Route::post('order', 'OrderController@store');
    Route::patch('update-status/{order}', 'OrderController@update');
    Route::get('history', 'OrderController@index');

    Route::middleware('admin')->group(function () {
        Route::patch('ubah-status/{user}', 'UserController@ubahStatus')->middleware('admin');
        Route::post('create-new-book', 'BookController@store');
        Route::patch('update-book/{book}', 'BookController@update');
        Route::delete('delete-book/{book}', 'BookController@destroy');
    });
});
Route::post('/generate', 'MidtransController@generate');
