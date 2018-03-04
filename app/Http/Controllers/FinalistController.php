<?php

namespace App\Http\Controllers;

use App\Student;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\DB;

class FinalistController extends Controller
{
    public function home(){
        $finalist = Student::where('stage',7)->get();
        $alternate = Student::where('stage',6)->get();
        return view('ats.finalist.home', compact('finalist', 'alternate'));
    }

    public function envelope(){
        $students = Student::where('batch_id',  env('AKASH_BATCH'))->where('stage','>',6)->orderBy('applicant_id')->get();
        return view('ats.finalist.pdf.envelope', compact('students'));
    }

    public function letter(){
        $students = Student::where('batch_id',  env('AKASH_BATCH'))->where('stage','>',6)->orderBy('applicant_id')->get();
        return view('ats.finalist.pdf.letter', compact('students'));
    }
}
