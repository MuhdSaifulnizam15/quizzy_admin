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
    
    // Users
    Route::group(['prefix' => 'users'], function () {
        Route::get('/', 'Web\UserController@index')->name('admin.users.index');
        Route::get('/create', 'Web\UserController@create')->name('admin.users.create');
        Route::post('/store', 'Web\UserController@store')->name('admin.users.store');
        Route::get('/edit/{id}', 'Web\UserController@edit')->name('admin.users.edit');
        Route::post('/update/{id}', 'Web\UserController@update')->name('admin.users.update');       
        Route::get('/delete/{id}', 'Web\UserController@delete')->name('admin.users.delete');
    });

    // Motivations
    Route::group(['prefix' => 'motivations'], function () {
        Route::get('/', 'Web\MotivationController@index')->name('admin.motivations.index');
        Route::get('/create', 'Web\MotivationController@create')->name('admin.motivations.create');
        Route::post('/store', 'Web\MotivationController@store')->name('admin.motivations.store');
        Route::get('/edit/{id}', 'Web\MotivationController@edit')->name('admin.motivations.edit');
        Route::post('/update/{id}', 'Web\MotivationController@update')->name('admin.motivations.update');       
        Route::get('/delete/{id}', 'Web\MotivationController@delete')->name('admin.motivations.delete');
    });

    // Assignments
    Route::group(['prefix' => 'assignments'], function () {
        Route::get('/', 'Web\AssignmentController@index')->name('admin.assignments.index');
        Route::get('/create', 'Web\AssignmentController@create')->name('admin.assignments.create');
        Route::post('/store', 'Web\AssignmentController@store')->name('admin.assignments.store');
        Route::get('/edit/{id}', 'Web\AssignmentController@edit')->name('admin.assignments.edit');
        Route::post('/update/{id}', 'Web\AssignmentController@update')->name('admin.assignments.update');       
        Route::get('/delete/{id}', 'Web\AssignmentController@delete')->name('admin.assignments.delete');
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
        Route::post('/add/question', 'Web\QuizController@addQuestion')->name('admin.quizzes.add.question');
        Route::post('/add/option', 'Web\QuizController@addOption')->name('admin.quizzes.add.option');
        Route::get('/{id}/delete/option', 'Web\QuizController@deleteOption')->name('admin.quizzes.delete.option');
        Route::post('/option/update', 'Web\QuizController@updateOption')->name('admin.quizzes.update.option');
        Route::post('/question/update', 'Web\QuizController@updateQuestion')->name('admin.quizzes.update.question');       
        Route::post('/{id}/delete/question', 'Web\QuizController@deleteQuestion')->name('admin.quizzes.delete.question');       
    });

    // Classroom
    Route::group(['prefix' => 'classrooms'], function () {
        Route::get('/', 'Web\ClassroomController@index')->name('admin.classrooms.index');
        Route::get('/create', 'Web\ClassroomController@create')->name('admin.classrooms.create');
        Route::post('/store', 'Web\ClassroomController@store')->name('admin.classrooms.store');
        Route::get('/edit/{id}', 'Web\ClassroomController@edit')->name('admin.classrooms.edit');
        Route::post('/update/{id}', 'Web\ClassroomController@update')->name('admin.classrooms.update');       
        Route::get('/{id}/delete', 'Web\ClassroomController@delete')->name('admin.classrooms.delete');
        Route::get('/delete/{classroom}/student/{id}', 'Web\ClassroomController@deleteStudentFromClass')->name('admin.classrooms.delete.student');
        Route::get('/detail/{id}', 'Web\ClassroomController@detail')->name('admin.classrooms.detail');
        Route::post('/addStudent/{id}', 'Web\ClassroomController@addStudentToClass')->name('admin.classrooms.add.student');
    });

    // Reports
    Route::group(['prefix' => 'reports'], function () {
        // Report By Class
        Route::get('/class', 'Web\ReportController@classReport')->name('admin.reports.class');
        // Report By Assignment
        Route::get('/assignment', 'Web\ReportController@assignmentReport')->name('admin.reports.assignment');
        // Report By Tutor
        Route::get('/tutor', 'Web\ReportController@tutorReport')->name('admin.reports.tutor');
        // Report By Quiz
        Route::get('/quiz', 'Web\ReportController@quizReport')->name('admin.reports.quiz');
    });
});