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
    Route::resource('account', 'UserController')->only(['edit', 'update', 'destroy'])->names([
        'edit' => 'candidate.account.edit',
        'update' => 'candidate.account.update',
        'destroy' => 'candidate.account.destroy',
    ]);
});

Route::group(['middleware' => 'employer', 'prefix' => 'employer'], function () {
    Route::redirect('', '/employer/jobs', 301)->name('employer');
    Route::get('/jobs/closed', 'PostController@closedJobs')->name('jobs.closed');
    Route::resource('jobs', 'PostController');
    Route::resource('application', 'ApplicationController')->only(['update']);
    Route::resource('account', 'UserController')->only(['edit', 'update', 'destroy']);
});
