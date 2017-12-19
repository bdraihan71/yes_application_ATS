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
Route::get('/ats/preliminary_application/result/publish', 'PreliminaryApplicationController@publish')->middleware('auth');
Route::get('/ats/preliminary_application/backup', 'PreliminaryApplicationController@backup')->middleware('auth');
Route::get('/ats/preliminary_application/improvise', 'PreliminaryApplicationController@improviseData')->middleware('auth');
Route::post('/ats/preliminary_application/improvise', 'PreliminaryApplicationController@processImproviseData')->middleware('auth');
Route::get('/ats/preliminary_application/sync', 'PreliminaryApplicationController@syncScore')->middleware('auth');

//phone interview
Route::get('/ats/phone_interview', 'PhoneInterviewController@home')->middleware('auth');
Route::get('/ats/phone_interview/result', 'PhoneInterviewController@result')->middleware('auth');
Route::get('/ats/phone_interview/result/publish', 'PhoneInterviewController@publish')->middleware('auth');
Route::get('/ats/phone_interview/backup', 'PhoneInterviewController@backup')->middleware('auth');
Route::get('/ats/phone_interview/score_sheet', 'PhoneInterviewController@scoreSheet')->middleware('auth');
Route::get('/ats/phone_interview/withdraw', 'PhoneInterviewController@withdraw')->middleware('auth');
Route::post('/ats/phone_interview/withdraw', 'PhoneInterviewController@processWithdraw')->middleware('auth');



//eltis
Route::get('/ats/eltis', 'EltisController@home')->middleware('auth');
Route::get('/ats/eltis/result/publish', 'EltisController@publish')->middleware('auth');
Route::get('/ats/eltis/backup', 'EltisController@backup')->middleware('auth');
Route::get('/ats/eltis/score_sheet', 'EltisController@scoreSheet')->middleware('auth');
Route::get('/ats/eltis/in_class_essary_score_sheet', 'EltisController@inClassEssayScoreSheet')->middleware('auth');
Route::get('/ats/eltis/id_card', 'EltisController@idcard')->middleware('auth');
Route::get('/ats/eltis/letter', 'EltisController@letter')->middleware('auth');
Route::get('/ats/eltis/attendance', 'EltisController@attendance')->middleware('auth');
Route::get('/ats/eltis/registration', 'EltisController@registration')->middleware('auth');
Route::get('/ats/eltis/envelope', 'EltisController@envelope')->middleware('auth');
Route::get('/ats/eltis/sit_sticker', 'EltisController@sitSticker')->middleware('auth');
Route::get('/ats/eltis/score_now', 'EltisController@scoreNow')->middleware('auth');
Route::post('/ats/eltis/save_score', 'EltisController@processScore')->middleware('auth');


//final
Route::get('/ats/final', 'FinalApplicationController@home')->middleware('auth');
Route::get('/ats/final/parent', 'FinalApplicationController@parent')->middleware('auth');
Route::post('/ats/final/parent', 'FinalApplicationController@processParent')->middleware('auth');
Route::get('/ats/final/envelope', 'FinalApplicationController@envelope')->middleware('auth');
Route::get('/ats/final/id_card', 'FinalApplicationController@idcard')->middleware('auth');
Route::get('/ats/final/invitation', 'FinalApplicationController@invitation')->middleware('auth');
Route::get('/ats/final/registration', 'FinalApplicationController@registration')->middleware('auth');
Route::get('/ats/final/interview-schedule', 'FinalApplicationController@interviewSchedule')->middleware('auth');
Route::get('/ats/final/slot/{slot}', 'FinalApplicationController@showSlot')->middleware('auth');
Route::get('/ats/final/group/score_sheet', 'FinalApplicationController@group')->middleware('auth');
Route::get('/ats/final/individual/score_sheet/{interviewer}', 'FinalApplicationController@individual')->middleware('auth');


Route::post('/ats/final/slot/{slot}/assign', 'FinalApplicationController@assign')->middleware('auth');

Route::post('/ats/final/add/slot', 'FinalApplicationController@addSlot')->middleware('auth');
Route::post('/ats/final/delete/slot', 'FinalApplicationController@deleteSlot')->middleware('auth');

//report
Route::get('/ats/report/districtwise', 'ReportController@districtwise')->middleware('auth');
Route::get('/ats/report/school', 'ReportController@school')->middleware('auth');
Route::get('/ats/report/aggregated', 'ReportController@aggregated')->middleware('auth');



Route::get('/ats/import', 'ImportController@studentList')->middleware('auth');
Route::get('/ats/backup/batch/{batch}/account/{account}/stage/{stage}', 'AtsController@downloadBackup')->middleware('auth');
Route::get('/ats/student/{student}/account/{account}', 'AtsController@studentPage')->middleware('auth');
Route::get('/ats/report/batch/{batch}/account/{account}/stage/{stage}', 'AtsController@stageReport')->middleware('auth');
Route::post('/ats/{student}/note/{stage}', 'AtsController@addNote')->middleware('auth');
Route::get('/ats/student', 'AtsController@student')->middleware('auth');
Route::get('/ats/file', 'AtsController@student_file_location')->middleware('auth');
Route::get('/ats/batch/{batch}/account/{account}/stage/{stage}', 'AtsController@stage')->middleware('auth');
Route::post('/ats/batch/{batch}/account/{account}/stage/{stage}', 'AtsController@processStage')->middleware('auth');
Route::get('/home', 'HomeController@dashboard')->middleware('auth');
Route::get('/upload', 'HomeController@upload')->middleware('auth');
Route::get('/student-details', 'HomeController@studentDetails')->middleware('auth');
// route registration attempts to home
Route::any('/register','HomeController@dashboard');
