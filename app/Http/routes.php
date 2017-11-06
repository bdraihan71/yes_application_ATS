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

Route::get('/api/sync/all', 'ApiController@syncAll');
Route::get('/api/sync/{firebase_id}', 'ApiController@syncData');

Route::get('/ats', 'AtsController@home')->middleware('auth');

//preliminary application
Route::get('/ats/preliminary_application', 'PreliminaryApplicationController@home')->middleware('auth');
Route::get('/ats/preliminary_application/import', 'PreliminaryApplicationController@import')->middleware('auth');
Route::get('/ats/preliminary_application/result', 'PreliminaryApplicationController@result')->middleware('auth');
Route::get('/ats/preliminary_application/backup', 'PreliminaryApplicationController@backup')->middleware('auth');








Route::get('/ats/import', 'ImportController@studentList')->middleware('auth');
Route::get('/ats/backup/batch/{batch}/account/{account}/stage/{stage}', 'AtsController@downloadBackup')->middleware('auth');
Route::get('/ats/student/{student}/account/{account}', 'AtsController@studentPage')->middleware('auth');
Route::get('/ats/report/batch/{batch}/account/{account}/stage/{stage}', 'AtsController@stageReport')->middleware('auth');
Route::post('/ats/{student}/note', 'AtsController@addNote')->middleware('auth');
Route::get('/ats/student', 'AtsController@student')->middleware('auth');
Route::get('/ats/file', 'AtsController@student_file_location')->middleware('auth');
Route::get('/ats/batch/{batch}/account/{account}/stage/{stage}', 'AtsController@stage')->middleware('auth');
Route::post('/ats/batch/{batch}/account/{account}/stage/{stage}', 'AtsController@processStage')->middleware('auth');
Route::get('/home', 'HomeController@dashboard')->middleware('auth');
Route::get('/upload', 'HomeController@upload')->middleware('auth');
Route::get('/student-details', 'HomeController@studentDetails')->middleware('auth');
// route registration attempts to home
Route::any('/register','HomeController@dashboard');
