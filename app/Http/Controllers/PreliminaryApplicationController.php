<?php

namespace App\Http\Controllers;

use App\Criteria;
use App\Student;
use PDF;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;

class PreliminaryApplicationController extends Controller
{
    public function home(){


        $score_sheets_passed = DB::table('score_sheets')->where('score_account_id', 1)->where('stage_id', 1)->where('has_passed', true)->get();
        $student_ids_passed = array_pluck($score_sheets_passed, 'student_id');
        $students_passed = Student::whereIn('id', $student_ids_passed)->get();

        $score_sheets_failed = DB::table('score_sheets')->where('score_account_id', 1)->where('stage_id', 1)->where('has_passed', false)->get();
        $student_ids_failed = array_pluck($score_sheets_failed, 'student_id');
        $students_failed = Student::whereIn('id', $student_ids_failed)->get();

        $query = Student::where('batch_id',  env('AKASH_BATCH'))->whereNotIn('id',array_merge($student_ids_passed, $student_ids_failed) );
        $not_scored_count = $query->count();
        $not_scored = $query->get();

        return view('ats.preliminary_application.home', compact('students_passed', 'students_failed', 'not_scored', 'not_scored_count'));
    }

    public function import()
    {
        return view('ats.preliminary_application.import');
    }

    public function result()
    {
        $data = $this->getAllData();

        $students = $data['students'];
        $account = $data['account'];
        $students_failed = $data['students_failed'];
        $not_scored = $data['not_scored'];
        $criterion = $data['criterion'];

        return view('ats.preliminary_application.result', compact('students', 'account', 'students_failed', 'not_scored', 'criterion'));
    }

    public function publish(){
        $students = Student::where('batch_id',  env('AKASH_BATCH'))->get();

        $pdf = PDF::loadView('ats.preliminary_application.pdf.result', compact('students'));

        return $pdf->download(env('AKASH_PDF_PRELIMINARY_RESULT_NAME'));
    }

    private function getAllData()
    {
        $account = 1;
        $score_sheets = DB::table('score_sheets')->where('score_account_id', 1)->where('stage_id', 1)->where('has_passed', true)->get();
        $student_ids = array_pluck($score_sheets, 'student_id');
        $students = Student::whereIn('id', $student_ids)->get();

        $score_sheets_failed = DB::table('score_sheets')->where('score_account_id', 1)->where('stage_id', 1)->where('has_passed', false)->get();
        $student_failed_ids = array_pluck($score_sheets_failed, 'student_id');
        $students_failed = Student::whereIn('id', $student_failed_ids)->get();

        $criterion = Criteria::where('stage_id', 1)->get();
        $not_scored = Student::where('batch_id',  env('AKASH_BATCH'))->whereNotIn('id',array_merge($student_ids, $student_failed_ids) )->get();

        return [
            'account' => $account,
            'students' => $students,
            'students_failed' => $students_failed,
            'criterion' => $criterion,
            'not_scored' => $not_scored
        ];
    }

    public function backup()
    {
        $data = $this->getAllData();

        $students = $data['students'];
        $account = $data['account'];
        $students_failed = $data['students_failed'];
        $not_scored = $data['not_scored'];
        $criterion = $data['criterion'];

        $stage = 1;
        $batch =  env('AKASH_BATCH');

        Excel::create('Filename', function ($excel) use ($students_failed, $criterion, $students, $account, $stage, $batch, $not_scored) {

            $excel->sheet('Sheetname', function ($sheet) use ($not_scored, $students_failed, $criterion, $students, $account, $stage, $batch) {

                $sheet->loadView('ats.preliminary_application.excel.student', compact('students', 'account', 'students_failed', 'not_scored', 'criterion'));
            });

        })->download('xls');

        return redirect()->back();
    }

}
