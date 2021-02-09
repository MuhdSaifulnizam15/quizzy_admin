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
    Route::get('/users', 'Web\UserController@index')->name('users.index');

    Route::get('/profile', function() {
        return view('admin/profile');
    })->name('profile');

    Route::resource('/motivations', 'Web\MotivationController');

    // Students
    Route::group(['prefix' => 'subjects'], function () {
        Route::get('/', 'Web\SubjectController@index')->name('admin.subjects.index');
        Route::get('/create', 'Web\SubjectController@create')->name('admin.subjects.create');
        Route::post('/store', 'Web\SubjectController@store')->name('admin.subjects.store');
        Route::get('/edit/{id}', 'Web\SubjectController@edit')->name('admin.subjects.edit');
        Route::post('/update/{id}', 'Web\SubjectController@update')->name('admin.subjects.update');       
        Route::get('/delete/{id}', 'Web\SubjectController@delete')->name('admin.subjects.delete');
    });

    // Quizzes
    Route::group(['prefix' => 'quizzes'], function () {
        Route::get('/', 'Web\QuizController@index')->name('admin.quizzes.index');
        Route::get('/create', 'Web\QuizController@create')->name('admin.quizzes.create');
        Route::post('/store', 'Web\QuizController@store')->name('admin.quizzes.store');
        Route::get('/edit/{id}', 'Web\QuizController@edit')->name('admin.quizzes.edit');
        Route::get('/activate/{id}', 'Web\QuizController@changeStatus')->name('admin.quizzes.activate');
        Route::post('/update/{id}', 'Web\QuizController@update')->name('admin.quizzes.update');       
        Route::get('/{id}/delete', 'Web\QuizController@delete')->name('admin.quizzes.delete');
    });
});