<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', 'HomeController@formPage');

Route::auth();

Route::get('/ats', 'AtsController@home')->middleware('auth');
Route::get('/ats/student', 'AtsController@student')->middleware('auth');
Route::get('/ats/file', 'AtsController@student_file_location')->middleware('auth');
Route::get('/ats/batch/{batch}/account/{account}/stage/{stage}', 'AtsController@stage')->middleware('auth');
Route::post('/ats/batch/{batch}/account/{account}/stage/{stage}', 'AtsController@processStage')->middleware('auth');
Route::get('/home', 'HomeController@dashboard')->middleware('auth');
Route::get('/upload', 'HomeController@upload')->middleware('auth');
Route::get('/student-details', 'HomeController@studentDetails')->middleware('auth');
// route registration attempts to home
Route::any('/register','HomeController@dashboard');
