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

        $did_not_submit_final_application = Student::where('stage',4)->get();
        $submitted_final_application = Student::where('stage','>', 4)->get();

        return view('ats.final_application.home', compact('did_not_submit_final_application', 'submitted_final_application'));
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
