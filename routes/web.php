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

// Route::middleware('auth')->name('users.')->prefix('users')->group(function () {
//     Route::get('/{user}', 'UserController@edit');
//     Route::patch('/{user}/update', 'UserController@update');
// });

Route::get('users/{user}',  ['as' => 'auth.edit', 'uses' => 'UserController@edit']);

Route::patch('users/{user}/update',  ['as' => 'users.update', 'uses' => 'UserController@update']);

Route::get('/home', 'HomeController@index')->name('home');
