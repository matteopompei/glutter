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

// Autenticazione
Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login');
Route::post('logout', 'Auth\LoginController@logout')->name('logout');

// Registrazione
Route::get('register', 'Auth\RegisterController@getRegisterForm')->name('register');
Route::post('register', 'Auth\RegisterController@register');

// Reset Password
Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
Route::post('password/reset', 'Auth\ResetPasswordController@reset');

// Route::middleware('auth')->name('users.')->prefix('users')->group(function () {
//     Route::get('/{user}', 'UserController@edit');
//     Route::patch('/{user}/update', 'UserController@update');
// });

// Modifica utenti
Route::get('users/edit', 'UserController@edit')->name('auth.edit');
Route::patch('users/update', 'UserController@update')->name('users.update');
Route::patch('users/imageupdate', 'UserController@imageUpdate')->name('users.imageupdate');

//Dashboard
Route::get('/dashboard', 'DashboardController@index')->name('dashboard');

// Gestione piatti
Route::middleware('auth')
    ->name('auth.')
    ->prefix('auth')
    ->group(function () {
        Route::get('/dish', 'DishController@index');
        Route::resource('/dish', 'dishController');
    });

// Front
Route::get("{any?}", function () {
    return view("front");
})->where("any", ".*");
