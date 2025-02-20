<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home');
    }

    public function formPage(){
        if(Auth::check()){
          return view('index');
        }else{
          return view('message');
        }
    }

    public function dashboard()
    {
        return view('dashboard');
    }

       public function studentDetails()
    {
        return view('student_details');
    }

      public function upload()
    {
        return view('upload');
    }



}
