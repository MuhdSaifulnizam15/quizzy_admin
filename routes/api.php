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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['prefix' => 'v1'], function () {
    Route::post('/login', 'API\AuthController@login');
    Route::post('/register', 'API\AuthController@register');
    Route::post('/password/forgot', 'API\AuthController@forgot');
    Route::get('/email/verify/{id}', 'API\AuthController@verify')->name('verification.verify');
    Route::get('/email/resend', 'API\AuthController@resend')->name('verification.resend');

    Route::group(['middleware' => ['auth:api', 'cors', 'json.response', 'verified']], function() {
        Route::get('/logout', 'API\AuthController@logout');
        Route::post('/password/change', 'API\AuthController@change');
        
        // Send reset password mail
        Route::post('reset-password', 'API\AuthController@sendPasswordResetLink');
        Route::post('/password/reset/', 'API\AuthController@callResetPassword');

        // Profile
        Route::get('/profile', 'API\UserController@getUserProfile');
        Route::post('/profile/update', 'API\UserController@updateUserProfile');

        // Assignment

        // Quiz

        // Motivation
        Route::get('/daily/motivation', 'API\MotivationController@getDailyMotivation');

        // Classroom

        // Dashboard
    });
});
