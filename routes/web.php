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

/*Route::get('/', function () {
    return view('welcome');
});*/


Route::get('/', 'FileController@list')->name('list');
Route::post('/search', 'FileController@search')->name('search');
Route::get('/test', 'FileController@test');
Route::get('/t', 'FileController@torrent');


Route::get('/watch', 'FileController@show')->name('watch');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');