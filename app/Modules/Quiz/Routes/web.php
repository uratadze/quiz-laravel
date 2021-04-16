<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your module. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::group(['prefix' => 'quiz'], function () {
    Route::get('/', 'QuizController@index')->name('quiz');
    Route::post('/','QuizController@store')->name('quiz.store');
    Route::get('/statistic', 'QuizController@statistic')->middleware('auth')->name('statistic');
});
