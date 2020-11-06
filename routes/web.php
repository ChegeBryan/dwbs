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

Route::redirect('', '/home', 301)->name('home');
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/jobs', 'HomeController@jobs')->name('jobs');

Auth::routes();

Route::group(['middleware' => 'auth'], function () {
    Route::redirect('', '/candidate', 301)->name('candidate');
    Route::resource('candidate', 'CandidateProfileController');
    Route::get('/job/{id}', 'PostController@showJobToCandidate')->name('job.candidate');
    Route::resource('application', 'ApplicationController')->only(['destroy', 'index', 'store']);
});

Route::group(['middleware' => 'employer', 'prefix' => 'employer'], function () {
    Route::redirect('', '/employer/jobs', 301)->name('employer');
    Route::resource('jobs', 'PostController');
    Route::patch('/job/{id}', 'PostController@updatePostStatus');
    Route::resource('application', 'ApplicationController')->only(['update']);
});
