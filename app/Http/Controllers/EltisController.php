<?php

namespace App\Http\Controllers;

use App\Student;
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

    public function result(){

    }

    public function publish(){

    }

    public function backup(){

    }

    public function scoreSheet(){

    }

    public function admitCard(){

    }

    public function letter(){
        $students = Student::where('batch_id',  env('AKASH_BATCH'))->where('stage','>',2)->orderBy('applicant_id')->get();
        return view('ats.eltis.pdf.letter', compact('students'));
    }


    public function envelope(){
        $students = Student::where('batch_id',  env('AKASH_BATCH'))->where('stage','>',2)->orderBy('applicant_id')->get();
        return view('ats.eltis.pdf.envelope', compact('students'));
    }
}
