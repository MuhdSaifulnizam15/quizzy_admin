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

    Route::get('/profile', function() {
        return view('admin/profile');
    })->name('profile');

    Route::resource('/motivations', 'Web\MotivationController');
    
    // Users
    Route::group(['prefix' => 'users'], function () {
        Route::get('/', 'Web\UserController@index')->name('admin.users.index');
        Route::get('/create', 'Web\UserController@create')->name('admin.users.create');
        Route::post('/store', 'Web\UserController@store')->name('admin.users.store');
        Route::get('/edit/{id}', 'Web\UserController@edit')->name('admin.users.edit');
        Route::post('/update/{id}', 'Web\UserController@update')->name('admin.users.update');       
        Route::get('/delete/{id}', 'Web\UserController@delete')->name('admin.users.delete');
    });

    // Subjects
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

    // Classroom
    Route::group(['prefix' => 'classrooms'], function () {
        Route::get('/', 'Web\ClassroomController@index')->name('admin.classrooms.index');
        Route::get('/create', 'Web\ClassroomController@create')->name('admin.classrooms.create');
        Route::post('/store', 'Web\ClassroomController@store')->name('admin.classrooms.store');
        Route::get('/edit/{id}', 'Web\ClassroomController@edit')->name('admin.classrooms.edit');
        Route::post('/update/{id}', 'Web\ClassroomController@update')->name('admin.classrooms.update');       
        Route::get('/{id}/delete', 'Web\ClassroomController@delete')->name('admin.classrooms.delete');
        Route::get('/detail/{id}', 'Web\ClassroomController@detail')->name('admin.classrooms.detail');
        Route::post('/detail/addStudent/{id}', 'Web\ClassroomController@addStudentToClass')->name('admin.classrooms.add.student');
    });
});