<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\DB;

class ReportController extends Controller
{
    public function home(Request $request){

            $query = "SELECT district,
  count(*) total, sum(case when sex = 'male' then 1 else 0 end) males,
  sum(case when sex = 'female' then 1 else 0 end) females,
  
  sum(case when stage='2' then 1 else 0 end) total2 , sum(case when sex = 'male' and stage='2' then 1 else 0 end) males2,
  sum(case when sex = 'female' and stage='2' then 1 else 0 end) females2
  
  
FROM  students group by district";
        $query = DB::select($query);
        return view('ats.report.home', compact('query'));
    }

    public function aggregated(){
        $query = "SELECT
  count(*) total, sum(case when sex = 'male' then 1 else 0 end) males,
  sum(case when sex = 'female' then 1 else 0 end) females,
  
  sum(case when stage='2' then 1 else 0 end) total2 , sum(case when sex = 'male' and stage='2' then 1 else 0 end) males2,
  sum(case when sex = 'female' and stage='2' then 1 else 0 end) females2
  
  
FROM  students ";
        $query = DB::select($query);
        return view('ats.report.aggregated', compact('query'));
    }
}
