<?php

namespace App\Http\Controllers;

use App\Constant;
use App\FinalInterviewSlot;
use App\Student;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;

class FinalApplicationController extends Controller
{
    public function home(){
        $score_sheets_passed = DB::table('score_sheets')->where('score_account_id', 1)->where('stage_id', 4)->where('has_passed', true)->get();
        $student_ids_passed = array_pluck($score_sheets_passed, 'student_id');
        $students_passed = Student::whereIn('id', $student_ids_passed)->get();

        $score_sheets_failed = DB::table('score_sheets')->where('score_account_id', 1)->where('stage_id', 4)->where('has_passed', false)->get();
        $student_ids_failed = array_pluck($score_sheets_failed, 'student_id');
        $students_failed = Student::whereIn('id', $student_ids_failed)->get();

        $query = Student::where('batch_id',  env('AKASH_BATCH'))->where('stage','>', 3)->whereNotIn('id',array_merge($student_ids_passed, $student_ids_failed) );
        $not_scored_count = $query->count();
        $not_scored = $query->get();

        return view('ats.final.home', compact('students_passed', 'students_failed', 'not_scored', 'not_scored_count'));
    }



    public function scoreSheet(){
        $students = Student::where('batch_id',  env('AKASH_BATCH'))->where('stage','>',3)->orderBy('applicant_id')->get();
        return view('ats.final.score-sheet', compact('students'));
    }

    public function processScoreSheet(Request $request){
        $students = Student::whereIn('stage', [4,5])->get();
        foreach($students as $student){
           if($request[$student->id]==4){
               $student->stage= 4;
           }else{
               $student->stage = 5;
           }
           $student->save();
        }
        $request->session()->flash('message', 'Updated!');
        return redirect()->back();
    }

}
