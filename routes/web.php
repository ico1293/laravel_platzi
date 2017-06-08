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

// PagesController es el nombre de la clase controller
// Home es el metodo dentro de la clase
Route::get('/', 'PagesController@home');

Route::get('/messages/{message}', 'MessagesController@show');

Route::post('/messages/create', 'MessagesController@create');

// all routes: register form, login register...
Auth::routes();

