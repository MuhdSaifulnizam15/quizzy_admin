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

// Route::post('/login', 'Web\AuthController@login');
// Route::post('/register', 'Web\AuthController@register');
// Route::post('/password/forgot', 'Web\AuthController@forgot');
// Route::get('/email/verify/{id}', 'Web\AuthController@verify')->name('verification.verify');
// Route::get('/email/resend', 'Web\AuthController@resend')->name('verification.resend');

Route::group(['middleware' => ['verified']], function() {
    // Route::get('/logout', 'Web\AuthController@logout');
    // Route::post('/password/change', 'Web\AuthController@change');
    
    // // Send reset password mail
    // Route::post('reset-password', 'Web\AuthController@sendPasswordResetLink');
    // Route::post('/password/reset/', 'Web\AuthController@callResetPassword');

    Route::get('/dashboard', 'Web\DashboardController@index')->name('dashbaord');
});