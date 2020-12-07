<?php

namespace App\Http\Controllers;

use App\ScoreSheet;
use App\Student;
use Maatwebsite\Excel\Facades\Excel;
use PDF;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\DB;

class EltisController extends Controller
{
    public function home(){
        $score_sheets_passed = DB::table('score_sheets')->where('score_account_id', 1)->where('stage_id', 3)->where('has_passed', true)->get();
        $student_ids_passed = array_pluck($score_sheets_passed, 'student_id');
        $students_passed = Student::whereIn('id', $student_ids_passed)->get();

        $score_sheets_failed = DB::table('score_sheets')->where('score_account_id', 1)->where('stage_id', 3)->where('has_passed', false)->get();
        $student_ids_failed = array_pluck($score_sheets_failed, 'student_id');
        $students_failed = Student::whereIn('id', $student_ids_failed)->get();

        $query = Student::where('batch_id',  env('AKASH_BATCH'))->where('stage','>', 2)->whereNotIn('id',array_merge($student_ids_passed, $student_ids_failed) );
        $not_scored_count = $query->count();
        $not_scored = $query->get();

        return view('ats.eltis.home', compact('students_passed', 'students_failed', 'not_scored', 'not_scored_count'));
    }


    public function publish(){
        $students = Student::where('batch_id',  env('AKASH_BATCH'))->where('stage','>',2)->orderBy('first_name')->get();
        $count = 1;
        foreach($students as $student)
        {
            if($student->stage >= 4)
            {
                $student = Student::find($student->id);
                $student->final_id = $count;
                $student->save();
                $count = $count + 1;
            }
           

        }
        $pdf = PDF::loadView('ats.eltis.pdf.result', compact('students'));

        return $pdf->download(env('AKASH_PDF_ELTIS_RESULT_NAME'));
    }

    public function backup(){
        $data = $this->getAllData();

        $students = $data['students'];
        $account = $data['account'];
        $students_failed = $data['students_failed'];
        $not_scored = $data['not_scored'];
        $criterion = $data['criterion'];

        $stage = 3;
        $batch =  env('AKASH_BATCH');


        Excel::create('Filename', function ($excel) use ($students_failed, $criterion, $students, $account, $stage, $batch, $not_scored) {

            $excel->sheet('Sheetname', function ($sheet) use ($not_scored, $students_failed, $criterion, $students, $account, $stage, $batch) {

                $sheet->loadView('ats.phone_interview.excel.student', compact('students', 'account', 'students_failed', 'not_scored', 'criterion'));
            });

        })->download('xls');

        return redirect()->back();
    }

    public function scoreSheet(){
        $students = Student::where('batch_id',  env('AKASH_BATCH'))->where('stage','>',2)->orderBy('applicant_id')->get();
        return view('ats.eltis.pdf.score-sheet', compact('students'));
    }

    public function inClassEssayScoreSheet(){
        $students = Student::where('batch_id',  env('AKASH_BATCH'))->where('stage','>',2)->orderBy('applicant_id')->get();
        return view('ats.eltis.pdf.in-class-essay-score-sheet', compact('students'));
    }

    public function idcard(){
        $students = Student::where('batch_id',  env('AKASH_BATCH'))->where('stage','>',2)->orderBy('applicant_id')->get();
        return view('ats.eltis.pdf.idcard', compact('students'));
    }

    public function letter(){
        $students = Student::where('batch_id',  env('AKASH_BATCH'))->where('stage','>',2)->orderBy('applicant_id')->get();
        return view('ats.eltis.pdf.letter', compact('students'));
    }


    public function envelope(){
        $students = Student::where('batch_id',  env('AKASH_BATCH'))->where('stage','>',2)->orderBy('applicant_id')->get();
        return view('ats.eltis.pdf.envelope', compact('students'));
    }


    public function attendance(){
        $students = Student::where('batch_id',  env('AKASH_BATCH'))->where('stage','>',2)->orderBy('applicant_id')->get();
        return view('ats.eltis.pdf.attendance', compact('students'));
    }

    public function registration(){
        $students = Student::where('batch_id',  env('AKASH_BATCH'))->where('stage','>',2)->orderBy('applicant_id')->get();
        return view('ats.eltis.pdf.registration', compact('students'));
    }

    public function sitSticker(){
        $students = Student::where('batch_id',  env('AKASH_BATCH'))->where('stage','>',2)->orderBy('applicant_id')->get();
        return view('ats.eltis.pdf.sit-sticker', compact('students'));
    }

    public function scoreNow(){
        $students = Student::where('batch_id',  env('AKASH_BATCH'))->where('stage','>',2)->orderBy('applicant_id')->get();
        return view('ats.eltis.score-now', compact('students'));
    }

    public function processScore(Request $request){
        foreach ($request->eltis as $student_id=>$score){
            $student = Student::find($student_id);
            $student->saveEltisScore($score);
        }

        $request->session()->flash('message', 'ELTiS Score Updated');
        return redirect()->back();
    }

    private function getAllData()
    {
        $account = 1;
        $score_sheets = DB::table('score_sheets')->where('score_account_id', 1)->where('stage_id', 3)->where('has_passed', true)->get();
        $student_ids = array_pluck($score_sheets, 'student_id');
        $students = Student::whereIn('id', $student_ids)->get();

        $score_sheets_failed = DB::table('score_sheets')->where('score_account_id', 1)->where('stage_id', 3)->where('has_passed', false)->get();
        $student_failed_ids = array_pluck($score_sheets_failed, 'student_id');
        $students_failed = Student::whereIn('id', $student_failed_ids)->get();

        $criterion = [];
        $not_scored = Student::where('batch_id',  env('AKASH_BATCH'))->where('stage', 3)->whereNotIn('id',array_merge($student_ids, $student_failed_ids) )->get();

        return [
            'account' => $account,
            'students' => $students,
            'students_failed' => $students_failed,
            'criterion' => $criterion,
            'not_scored' => $not_scored
        ];
    }

    public function serialAssignment(){
        $students = Student::where('batch_id',  env('AKASH_BATCH'))->where('stage','>',2)->orderBy('first_name')->get();
        return view('ats.eltis.serial-assignment', compact('students'));
    }

    public function processSerialAssignment(Request $request){
        foreach ($request->serial as $student_id=>$serial){
            $student = Student::find($student_id);
            $student->saveSerial($serial);
        }

        $request->session()->flash('message', 'Serials Updated');
        return redirect()->back();
    }


}
