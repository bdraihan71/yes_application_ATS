<?php

namespace App\Http\Controllers;

use App\ApplicationFile;
use App\Batch;
use App\Criteria;
use App\CriteriawiseScore;
use App\ScoreSheet;
use App\Student;
use App\User;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\DB;

class AtsController extends Controller
{
    public function home(){
        return view('ats.home');
    }

    public function student(Request $request){
        if($request->batch_id == ''){
            $students = Student::all();
        }else{
            $students = Batch::find($request->batch_id)->students;
        }
        $batches = Batch::all();

        return view('ats.student', compact('students', 'batches'));
    }

    public function student_file_location(){
        $batches = Batch::all();
        $application_files = ApplicationFile::all();
        return view('ats.student_file_location', compact('application_files', 'batches'));
    }

    public function stage($batch,$account, $stage){

        $score_sheets = DB::table('score_sheets')->where('score_account_id', $account)->where('stage_id', $stage)->where('has_passed', true)->get();
        $student_ids = array_pluck($score_sheets, 'student_id');
        $students = Student::whereIn('id', $student_ids)->get();

        $score_sheets_failed = DB::table('score_sheets')->where('score_account_id', $account)->where('stage_id', $stage)->where('has_passed', false)->get();
        $student_failed_ids = array_pluck($score_sheets_failed, 'student_id');
        $students_failed = Student::whereIn('id', $student_failed_ids)->get();

        $criterion = Criteria::where('stage_id', $stage)->get();
        if($stage==1){
            $not_scored = Student::where('batch_id', $batch)->whereNotIn('id',array_merge($student_ids, $student_failed_ids) )->get();
        }else{
            $not_scored = DB::table('score_sheets')->where('score_account_id', $account)->where('stage_id', $stage-1)->where('has_passed', true)->get();
            $student_ids_in_previous_stage = array_pluck($not_scored, 'student_id');
            $student_ids_not_scored = array_diff( $student_ids_in_previous_stage, $student_ids );
            $student_ids_not_scored = array_diff( $student_ids_not_scored, $student_failed_ids );
            $not_scored = Student::whereIn('id', $student_ids_not_scored)->get();
        }


        return view('ats.stages.preliminary_application', compact('students', 'account', 'students_failed', 'not_scored', 'criterion'));
    }

    public function processStage(Request $request, $batch, $account, $stage)
    {
        if($stage == 1) {
            if($request->score == null){
                $criterion = Criteria::where('stage_id', 1)->get();
            }else {
                $criterion = Criteria::where('stage_id', 1)->whereNotIn('id', array_keys($request->score))->get();
            }
            if(isset($criterion)){
                foreach ($criterion as $item) {
                    $criteriawise_score = CriteriawiseScore::where('criteria_id', $item->id)->where('student_id', $request->student_id)->where('score_account_id', $account)->first();
                    if($criteriawise_score){
                        $criteriawise_score->score = 0;
                        $criteriawise_score->save();
                    }else{
                        CriteriawiseScore::create([
                            'score' => 0,
                            'student_id' => $request->student_id,
                            'criteria_id' => $item->id,
                            'score_account_id' => $account
                        ]);
                    }
                }
            }
            if($request->score!= null){
                foreach ($request->score as $key => $value) {
                    if ($value == "on") {
                        $criteriawise_score = CriteriawiseScore::where('criteria_id', $key)->where('student_id', $request->student_id)->where('score_account_id', $account)->first();

                        if ($criteriawise_score) {
                            $criteriawise_score->score = 1;
                            $criteriawise_score->save();
                        } else {
                            CriteriawiseScore::create([
                                'score' => 1,
                                'student_id' => $request->student_id,
                                'criteria_id' => $key,
                                'score_account_id' => $account
                            ]);
                        }
                    }
                }
            }


            $score_sheet = ScoreSheet::where('student_id', $request->student_id)->where('stage_id', $stage)->where('score_account_id', $account)->first();
            $total = 0;
            $scores = CriteriawiseScore::whereIn('criteria_id', [1, 3, 4, 5, 6, 7])->where('student_id', $request->student_id)->where('score_account_id', $account)->get();
            foreach ($scores as $score) {
                $total = $total + $score->score;
            }

            if ($score_sheet) {
                $score_sheet->score = $total;
                $score_sheet->has_passed = ($total == 6);
                $score_sheet->save();
            } else {
                ScoreSheet::create(['score' => $total, 'student_id' => $request->student_id, 'stage_id' => 1, 'has_passed' => ($total == 6), 'score_account_id' => $account]);
            }
        }

        return redirect()->back() ;
    }
}
