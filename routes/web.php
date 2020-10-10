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

Route::get('/', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/jobs', 'HomeController@jobs')->name('jobs');
Route::group(['middleware' => 'employer', 'prefix' => 'employer'], function () {
    Route::redirect('', '/employer/jobs', 301)->name('employer');
    Route::resource('jobs', 'JobController');
});

Route::group(['middleware' => 'auth'], function () {
    Route::redirect('', '/candidate', 301)->name('candidate');
    Route::resource('candidate', 'CandidateProfileController');
    Route::resource('application', 'ApplicationController')->only(['destroy']);
});
