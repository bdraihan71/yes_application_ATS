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

// Route::get('/', 'HomeController@formPage');
Route::get('/', function () {
    if(Auth::check()) {
        return redirect('ats/preliminary_application');
    } else {
        return view('auth.login');
    }
});

Route::auth();

Route::get('/api/sync/all', 'ApiController@syncAll');
Route::get('/api/sync/fathernid', 'ApiController@fatherNid');
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
Route::get('/ats/eltis/serial_assignment', 'EltisController@serialAssignment')->middleware('auth');
Route::post('/ats/eltis/serial_assignment', 'EltisController@processSerialAssignment')->middleware('auth');


//final
Route::get('/ats/final', 'FinalApplicationController@home')->middleware('auth');

Route::get('/ats/final/score-sheet', 'FinalApplicationController@scoreSheet')->middleware('auth');
Route::post('/ats/final/score-sheet', 'FinalApplicationController@processScoreSheet')->middleware('auth');






//final interview
Route::get('/ats/final-interview', 'FinalInterviewController@home')->middleware('auth');
Route::get('/ats/final-interview/schedule', 'FinalInterviewController@schedule')->middleware('auth');
Route::get('/ats/final-interview/schedule-group', 'FinalInterviewController@scheduleGroup')->middleware('auth');
Route::get('/ats/final-interview/parent', 'FinalInterviewController@parent')->middleware('auth');
Route::post('/ats/final-interview/parent', 'FinalInterviewController@processParent')->middleware('auth');
Route::get('/ats/final-interview/envelope', 'FinalInterviewController@envelope')->middleware('auth');
Route::get('/ats/final-interview/id_card', 'FinalInterviewController@idcard')->middleware('auth');
Route::get('/ats/final-interview/parent_id_card', 'FinalInterviewController@parentIdcard')->middleware('auth');
Route::get('/ats/final-interview/invitation', 'FinalInterviewController@invitation')->middleware('auth');
Route::get('/ats/final-interview/registration', 'FinalInterviewController@registration')->middleware('auth');
Route::get('/ats/final-interview/interview-schedule', 'FinalInterviewController@interviewSchedule')->middleware('auth');
Route::get('/ats/final-interview/slot/{slot}', 'FinalInterviewController@showSlot')->middleware('auth');
Route::get('/ats/final-interview/group/score_sheet', 'FinalInterviewController@group')->middleware('auth');
Route::get('/ats/final-interview/individual/score_sheet/{interviewer}', 'FinalInterviewController@individual')->middleware('auth');
Route::get('/ats/final-interview/parent_questionnaire', 'FinalInterviewController@parentQuestionnaire')->middleware('auth');
Route::get('/ats/final-interview/security', 'FinalInterviewController@security')->middleware('auth');

Route::post('/ats/final-interview/slot/{slot}/assign', 'FinalInterviewController@assign')->middleware('auth');

Route::post('/ats/final-interview/add/slot', 'FinalInterviewController@addSlot')->middleware('auth');
Route::post('/ats/final-interview/delete/slot', 'FinalInterviewController@deleteSlot')->middleware('auth');

Route::get('/ats/final-interview/contact', 'FinalInterviewController@contactInformationGroup')->middleware('auth');

Route::get('/ats/final-interview/hfletter-scoresheet', 'FinalInterviewController@hfletterScoresheet')->middleware('auth');
Route::get('/ats/final-interview/teacher-recommendation-scoresheet', 'FinalInterviewController@teacherRecommendationScoresheet')->middleware('auth');
Route::get('/ats/final-interview/activity-achievement-scoresheet', 'FinalInterviewController@activityAchievementScoresheet')->middleware('auth');
Route::get('/ats/final-interview/overall-appraisal-scoresheet', 'FinalInterviewController@overallAppraisalScoresheet')->middleware('auth');
Route::get('/ats/final-interview/result/publish', 'FinalInterviewController@publish')->middleware('auth');


Route::get('/ats/final-interview/score-sheet', 'FinalInterviewController@scoreSheet')->middleware('auth');
Route::post('/ats/final-interview/score-sheet', 'FinalInterviewController@processScoreSheet')->middleware('auth');

//Finalist
Route::get('/ats/finalist', 'FinalistController@home')->middleware('auth');
Route::get('/ats/finalist/envelope', 'FinalistController@envelope')->middleware('auth');
Route::get('/ats/finalist/letter', 'FinalistController@letter')->middleware('auth');


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
Route::delete('/studentDestroy/{id}', 'AtsController@studentDestroy')->middleware('auth')->name('student.destroy');
Route::get('/student/edit/{id}', 'AtsController@edit')->middleware('auth')->name('student.edit');
Route::post('/student/update/{id}', 'AtsController@update')->middleware('auth')->name('student.update');
Route::get('/student/create', 'AtsController@create')->middleware('auth')->name('student.create');
Route::post('/student/create', 'AtsController@store')->middleware('auth')->name('student.store');
// route registration attempts to home
Route::any('/register','HomeController@dashboard');
Route::get('/sendSMS', 'SMSController@sendSMS');
