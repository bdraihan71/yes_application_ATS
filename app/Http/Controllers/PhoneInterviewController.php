<?php

namespace App\Http\Controllers;

use App\Criteria;
use App\Student;
use Maatwebsite\Excel\Facades\Excel;
use PDF;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\DB;

class PhoneInterviewController extends Controller
{
    public function home(){
        $score_sheets_passed = DB::table('score_sheets')->where('score_account_id', 1)->where('stage_id', 2)->where('has_passed', true)->get();
        $student_ids_passed = array_pluck($score_sheets_passed, 'student_id');
        $students_passed = Student::whereIn('id', $student_ids_passed)->get();

        $score_sheets_failed = DB::table('score_sheets')->where('score_account_id', 1)->where('stage_id', 2)->where('has_passed', false)->get();
        $student_ids_failed = array_pluck($score_sheets_failed, 'student_id');
        $students_failed = Student::whereIn('id', $student_ids_failed)->get();

        $query = Student::where('batch_id',  env('AKASH_BATCH'))->where('stage','>', 1)->whereNotIn('id',array_merge($student_ids_passed, $student_ids_failed) );
        $not_scored_count = $query->count();
        $not_scored = $query->get();

        return view('ats.phone_interview.home', compact('students_passed', 'students_failed', 'not_scored', 'not_scored_count'));

    }

    public function result()
    {
//        ini_set('memory_limit', '-1');
        $data = $this->getAllData();

        $students = $data['students'];
        $account = $data['account'];
        $students_failed = $data['students_failed'];
        $not_scored = $data['not_scored'];
        $criterion = $data['criterion'];

        return view('ats.phone_interview.result', compact('students', 'account', 'students_failed', 'not_scored', 'criterion'));
    }

    private function getAllData()
    {
        $account = 1;
        $score_sheets = DB::table('score_sheets')->where('score_account_id', 1)->where('stage_id', 2)->where('has_passed', true)->get();
        $student_ids = array_pluck($score_sheets, 'student_id');
        $students = Student::whereIn('id', $student_ids)->get();

        $score_sheets_failed = DB::table('score_sheets')->where('score_account_id', 1)->where('stage_id', 2)->where('has_passed', false)->get();
        $student_failed_ids = array_pluck($score_sheets_failed, 'student_id');
        $students_failed = Student::whereIn('id', $student_failed_ids)->get();

        $criterion = Criteria::where('stage_id', 2)->get();
        $not_scored = Student::where('batch_id',  env('AKASH_BATCH'))->where('stage', 1)->where('has_passed', true)->whereNotIn('id',array_merge($student_ids, $student_failed_ids) )->get();

        return [
            'account' => $account,
            'students' => $students,
            'students_failed' => $students_failed,
            'criterion' => $criterion,
            'not_scored' => $not_scored
        ];
    }

    public function publish(){
//        ini_set('memory_limit', '-1');
        $students = Student::where('batch_id',  env('AKASH_BATCH'))->where('stage','>',1)->orderBy('first_name')->get();

        $pdf = PDF::loadView('ats.phone_interview.pdf.result', compact('students'));

        return $pdf->download(env('AKASH_PDF_PHONE_INTERVIEW_RESULT_NAME'));
    }

    public function backup()
    {
        $data = $this->getAllData();

        $students = $data['students'];
        $account = $data['account'];
        $students_failed = $data['students_failed'];
        $not_scored = $data['not_scored'];
        $criterion = $data['criterion'];

        $stage = 2;
        $batch =  env('AKASH_BATCH');


        Excel::create('Filename', function ($excel) use ($students_failed, $criterion, $students, $account, $stage, $batch, $not_scored) {

            $excel->sheet('Sheetname', function ($sheet) use ($not_scored, $students_failed, $criterion, $students, $account, $stage, $batch) {

                $sheet->loadView('ats.phone_interview.excel.student', compact('students', 'account', 'students_failed', 'not_scored', 'criterion'));
            });

        })->download('xls');

        return redirect()->back();
    }

    public function scoreSheet()
    {
        ini_set('memory_limit', '-1');
        $students = Student::where('batch_id',  env('AKASH_BATCH'))->where('stage','>',1)->orderBy('applicant_id')->get();

//        return view('ats.phone_interview.pdf.score_sheet', compact('students'));
        $pdf = PDF::loadView('ats.phone_interview.pdf.score_sheet', compact('students'));

        return $pdf->download(env('AKASH_PDF_PHONE_INTERVIEW_SCORE_SHEET_NAME'));
    }

}
