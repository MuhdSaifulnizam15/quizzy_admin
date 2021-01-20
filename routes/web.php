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
    return view('auth/login');
});

Auth::routes(['verify' => true]);

Route::group(['middleware' => ['verified']], function() {
    Route::get('/dashboard', 'Web\DashboardController@index')->name('dashboard');
    Route::get('/users', 'Web\UserController@index')->name('user.index');

    Route::get('/profile', function() {
        return view('admin/profile');
    })->name('profile');
});