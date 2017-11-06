<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class ImportController extends Controller
{
    public function studentList(){

        return view('ats.import.all_application');
    }
}
