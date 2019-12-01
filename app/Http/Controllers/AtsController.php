<?php

namespace App\Http\Controllers;

use App\ActionLog;
use App\ApplicationFile;
use App\Batch;
use App\Constant;
use App\Criteria;
use App\CriteriawiseScore;
use App\Note;
use App\ScoreSheet;
use App\Student;
use App\User;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Redirect;


class AtsController extends Controller
{
    public function home()
    {
        return view('ats.home');
    }

    public function student(Request $request)
    {
        if ($request->batch_id == '') {
            $students = Student::all();
        } else {
            $students = Batch::find($request->batch_id)->students;
        }
        $batches = Batch::all();

        return view('ats.student', compact('students', 'batches'));
    }

    public function student_file_location()
    {
        $batches = Batch::all();
        $application_files = ApplicationFile::all();
        return view('ats.student_file_location', compact('application_files', 'batches'));
    }

    public function stage($batch, $account, $stage)
    {

        $score_sheets = DB::table('score_sheets')->where('score_account_id', $account)->where('stage_id', $stage)->where('has_passed', true)->get();
        $student_ids = array_pluck($score_sheets, 'student_id');
        $students = Student::whereIn('id', $student_ids)->get();

        $score_sheets_failed = DB::table('score_sheets')->where('score_account_id', $account)->where('stage_id', $stage)->where('has_passed', false)->get();
        $student_failed_ids = array_pluck($score_sheets_failed, 'student_id');
        $students_failed = Student::whereIn('id', $student_failed_ids)->get();

        $criterion = Criteria::where('stage_id', $stage)->get();
        if ($stage == 1) {
            $query = Student::where('batch_id', $batch)->whereNotIn('id', array_merge($student_ids, $student_failed_ids));
            $not_scored_count = $query->count();
            $not_scored = $query->get()->take(10);
        } else {
            $not_scored_count = 'unknown';
            $not_scored = DB::table('score_sheets')->where('score_account_id', $account)->where('stage_id', $stage - 1)->where('has_passed', true)->get();
            $student_ids_in_previous_stage = array_pluck($not_scored, 'student_id');
            $student_ids_not_scored = array_diff($student_ids_in_previous_stage, $student_ids);
            $student_ids_not_scored = array_diff($student_ids_not_scored, $student_failed_ids);
            $not_scored = Student::whereIn('id', $student_ids_not_scored)->get();
        }


        return view('ats.stages.preliminary_application', compact('not_scored_count', 'students', 'account', 'students_failed', 'not_scored', 'criterion'));
    }

    public function processStage(Request $request, $batch, $account, $stage)
    {
        
        if ($stage == 1) {
            if ($request->score == null) {
                $criterion = Criteria::where('stage_id', 1)->get();
            } else {
                $criterion = Criteria::where('stage_id', 1)->whereNotIn('id', array_keys($request->score))->get();
            }
            if (isset($criterion)) {
                foreach ($criterion as $item) {
                    $criteriawise_score = CriteriawiseScore::where('criteria_id', $item->id)->where('student_id', $request->student_id)->where('score_account_id', $account)->first();
                    if ($criteriawise_score) {
                        $criteriawise_score->score = 0;
                        $criteriawise_score->save();
                        ActionLog::create(['action_id' => '7', 'action_by_user_id' => Auth::user()->id, 'action_on_student_id' => $request->student_id, 'content' => 'criteriawise_score_id:' . $criteriawise_score->criteria_id . ';score:0']);
                    } else {
                        $criteriawise_score_item = CriteriawiseScore::create([
                            'score' => 0,
                            'student_id' => $request->student_id,
                            'criteria_id' => $item->id,
                            'score_account_id' => $account
                        ]);
                        ActionLog::create(['action_id' => '6', 'action_by_user_id' => Auth::user()->id, 'action_on_student_id' => $request->student_id, 'content' => 'criteriawise_score_id:' . $criteriawise_score_item->criteria_id . ';score:0']);
                    }
                }
            }
            if ($request->score != null) {
                foreach ($request->score as $key => $value) {
                    if ($value == "on") {
                        $criteriawise_score = CriteriawiseScore::where('criteria_id', $key)->where('student_id', $request->student_id)->where('score_account_id', $account)->first();

                        if ($criteriawise_score) {
                            $criteriawise_score->score = 1;
                            $criteriawise_score->save();
                            ActionLog::create(['action_id' => '7', 'action_by_user_id' => Auth::user()->id, 'action_on_student_id' => $request->student_id, 'content' => 'criteriawise_score_id:' . $criteriawise_score->criteria_id . ';score:1']);
                        } else {
                            $criteriawise_score_item = CriteriawiseScore::create([
                                'score' => 1,
                                'student_id' => $request->student_id,
                                'criteria_id' => $key,
                                'score_account_id' => $account
                            ]);
                            ActionLog::create(['action_id' => '6', 'action_by_user_id' => Auth::user()->id, 'action_on_student_id' => $request->student_id, 'content' => 'criteriawise_score_id:' . $criteriawise_score_item->criteria_id . ';score:1']);
                        }
                    }
                }
            }


            $score_sheet = ScoreSheet::where('student_id', $request->student_id)->where('stage_id', $stage)->where('score_account_id', $account)->first();
            $total = 0;
            $scores = CriteriawiseScore::whereIn('criteria_id', [1, 3, 4, 5, 6, 7, 8])->where('student_id', $request->student_id)->where('score_account_id', $account)->get();
            foreach ($scores as $score) {
                $total = $total + $score->score;
            }

            if ($score_sheet) {
                $score_sheet->score = $total;
                $score_sheet->has_passed = ($total == 7);
                $score_sheet->save();
                ActionLog::create(['action_id' => '4', 'action_by_user_id' => Auth::user()->id, 'action_on_student_id' => $request->student_id, 'content' => 'total:' . $total . ';has_passed:' . (($total == 7) ? 'yes' : 'no')]);
                $student = Student::find($request->student_id);
            } else {
                $score_sheet = ScoreSheet::create(['score' => $total, 'student_id' => $request->student_id, 'stage_id' => 1, 'has_passed' => ($total == 7), 'score_account_id' => $account]);
                ActionLog::create(['action_id' => '5', 'action_by_user_id' => Auth::user()->id, 'action_on_student_id' => $request->student_id, 'content' => 'score_sheet_id:' . $score_sheet->id]);
                $student = Student::find($request->student_id);
            }

            if ($total == 7) {
                $student->stage = 2;
            } else {
                $student->stage = 1;
            }
            $student->save();
            $request->session()->flash('message', 'Preliminary Application Score Saved!');
        }
        else if ($stage == 2) {
//            return $request->all();

            if ($request->score == null) {
                $criterion = Criteria::where('stage_id', 2)->get();
            } else {
                $criterion = Criteria::where('stage_id', 2)->whereNotIn('id', array_keys($request->score))->get();
            }
            if (isset($criterion)) {
                foreach ($criterion as $item) {
                    $criteriawise_score = CriteriawiseScore::where('criteria_id', $item->id)->where('student_id', $request->student_id)->where('score_account_id', $account)->first();
                    if ($criteriawise_score) {
                        $criteriawise_score->score = 0;
                        $criteriawise_score->save();
                        ActionLog::create(['action_id' => '8', 'action_by_user_id' => Auth::user()->id, 'action_on_student_id' => $request->student_id, 'content' => 'criteriawise_score_id:' . $criteriawise_score->criteria_id . ';score:0']);
                    } else {
                        $criteriawise_score_item = CriteriawiseScore::create([
                            'score' => 0,
                            'student_id' => $request->student_id,
                            'criteria_id' => $item->id,
                            'score_account_id' => $account
                        ]);
                        ActionLog::create(['action_id' => '9', 'action_by_user_id' => Auth::user()->id, 'action_on_student_id' => $request->student_id, 'content' => 'criteriawise_score_id:' . $criteriawise_score_item->criteria_id . ';score:0']);
                    }
                }
            }
            if ($request->score != null) {
                foreach ($request->score as $key => $value) {

                    $criteriawise_score = CriteriawiseScore::where('criteria_id', $key)->where('student_id', $request->student_id)->where('score_account_id', $account)->first();

                    if ($criteriawise_score) {
                        $criteriawise_score->score = $value;
                        $criteriawise_score->save();
                        ActionLog::create(['action_id' => '8', 'action_by_user_id' => Auth::user()->id, 'action_on_student_id' => $request->student_id, 'content' => 'criteriawise_score_id:' . $criteriawise_score->criteria_id . ';score:' . $value]);
                    } else {
                        $criteriawise_score_item = CriteriawiseScore::create([
                            'score' => $value,
                            'student_id' => $request->student_id,
                            'criteria_id' => $key,
                            'score_account_id' => $account
                        ]);
                        ActionLog::create(['action_id' => '9', 'action_by_user_id' => Auth::user()->id, 'action_on_student_id' => $request->student_id, 'content' => 'criteriawise_score_id:' . $criteriawise_score_item->criteria_id . ';score:' . $value]);
                    }

                }
            }


            $score_sheet = ScoreSheet::where('student_id', $request->student_id)->where('stage_id', $stage)->where('score_account_id', $account)->first();
            $total = 0;
            $scores = CriteriawiseScore::whereIn('criteria_id', [9, 10, 11, 12, 13, 14, 15, 16])->where('student_id', $request->student_id)->where('score_account_id', $account)->get();
            foreach ($scores as $score) {
                $total = $total + $score->score;
            }

            $qualifying_mark = Constant::where('key', 'Phone Interview Qualifying Mark')->first()->value;
            if ($score_sheet) {
                $score_sheet->score = $total;
                $score_sheet->has_passed = ($total >= $qualifying_mark);
                $score_sheet->save();
                ActionLog::create(['action_id' => '11', 'action_by_user_id' => Auth::user()->id, 'action_on_student_id' => $request->student_id, 'content' => 'total:' . $total . ';has_passed:' . (($total >= $qualifying_mark) ? 'yes' : 'no')]);
                $student = Student::find($request->student_id);
            } else {
                $score_sheet = ScoreSheet::create(['score' => $total, 'student_id' => $request->student_id, 'stage_id' => 2, 'has_passed' => $total>=$qualifying_mark, 'score_account_id' => $account]);
                ActionLog::create(['action_id' => '10', 'action_by_user_id' => Auth::user()->id, 'action_on_student_id' => $request->student_id, 'content' => 'score_sheet_id:' . $score_sheet->id]);
                $student = Student::find($request->student_id);
            }

            if ($total >= $qualifying_mark) {
                $student->stage = 3;
            } else
                $student->stage = 2;
        }

        if($request->is_access_student == "on"){
            $student->is_access_student = true;
        }else{
            $student->is_access_student = false;
        }

        $student->save();
        $request->session()->flash('message', 'Application saved!');

        return redirect()->back() ;
    }

    public function addNote(Request $request, $student, $stage){
        $note = Note::create(['student_id'=>$student, 'user_id' => Auth::user()->id, 'body' => $request->body, 'stage'=>$stage]);
        ActionLog::create(['action_id'=>'2', 'action_by_user_id' => Auth::user()->id, 'action_on_student_id' => $student, 'content' => 'note_id:'.$note->id]);
        return redirect()->back();
    }

    public function studentPage(Request $request, $student, $account){

        $score_sheets_passed = DB::table('score_sheets')->where('score_account_id', 1)->where('stage_id', 1)->where('has_passed', true)->get();
        $student_ids_passed = array_pluck($score_sheets_passed, 'student_id');
        $students_passed = Student::whereIn('id', $student_ids_passed)->get();
        $score_sheets_failed = DB::table('score_sheets')->where('score_account_id', 1)->where('stage_id', 1)->where('has_passed', false)->get();
        $student_ids_failed = array_pluck($score_sheets_failed, 'student_id');
        $students_failed = Student::whereIn('id', $student_ids_failed)->get();
        $query = Student::where('batch_id',  env('AKASH_BATCH'))->whereNotIn('id',array_merge($student_ids_passed, $student_ids_failed) )->whereNotNull('application_submitted');
        $next = Student::where('batch_id',  env('AKASH_BATCH'))->whereNotNull('application_submitted')->where('id', '>', $student)->first();
        $pre = Student::where('batch_id',  env('AKASH_BATCH'))->whereNotNull('application_submitted')->where('id', '<', $student)->orderBy('id', 'desc')->first();
        
        $score_sheets_passed_phone = DB::table('score_sheets')->where('score_account_id', 1)->where('stage_id', 2)->where('has_passed', true)->get();
        $student_ids_passed_phone = array_pluck($score_sheets_passed_phone, 'student_id');
        $students_passed = Student::whereIn('id', $student_ids_passed_phone)->get();
        $score_sheets_failed_phone = DB::table('score_sheets')->where('score_account_id', 1)->where('stage_id', 2)->where('has_passed', false)->get();
        $student_ids_failed_phone = array_pluck($score_sheets_failed_phone, 'student_id');
        $students_failed_phone = Student::whereIn('id', $student_ids_failed_phone)->get();
        $next_phone = Student::where('batch_id',  env('AKASH_BATCH'))->where('stage','>', 1)->whereNotIn('id',array_merge($student_ids_passed_phone, $student_ids_failed_phone) )->where('id', '>', $student)->first();
        $pre_phone = Student::where('batch_id',  env('AKASH_BATCH'))->where('stage','>', 1)->whereNotIn('id',array_merge($student_ids_passed_phone, $student_ids_failed_phone) )->where('id', '<', $student)->orderBy('id', 'desc')->first();

        $criterion = Criteria::where('stage_id', 1)->get();
        $criterion2 = Criteria::where('stage_id', 2)->get();
        $student = Student::find($student);
        if($student){
            $action_logs = ActionLog::where('action_on_student_id',$student->id)->orderBy('created_at', 'DESC')->get();
            return view('ats.studentPage', compact('student', 'account', 'criterion', 'criterion2', 'action_logs','next','pre','next_phone','pre_phone'));
        }
        $request->session()->flash('message', 'No more application!');
        return redirect('/ats/preliminary_application');
    }

    public function stageReport(Request $request, $batch, $account, $stage){
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


        return view('ats.stages.stage_report', compact('students', 'account', 'students_failed', 'not_scored', 'criterion'));
    }

    public function downloadBackup($batch, $account, $stage){
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



        Excel::create('Filename', function($excel)  use ($students_failed, $criterion, $students, $account, $stage, $batch) {

            $excel->sheet('Sheetname', function($sheet) use ($students_failed, $criterion, $students, $account,$stage, $batch){


                $score_sheets = DB::table('score_sheets')->where('score_account_id', $account)->where('stage_id', $stage)->where('has_passed', true)->get();
                $student_ids = array_pluck($score_sheets, 'student_id');

                $score_sheets_failed = DB::table('score_sheets')->where('score_account_id', $account)->where('stage_id', $stage)->where('has_passed', false)->get();
                $student_failed_ids = array_pluck($score_sheets_failed, 'student_id');

                $data = Student::where('batch_id', $batch)->whereNotIn('id',array_merge($student_ids, $student_failed_ids))->get()->toArray();

//                $sheet->fromArray($data);

                $sheet->loadView('ats.excel.failed_student', compact('students', 'account', 'students_failed', 'not_scored', 'criterion'));
            });

        })->download('xls');
    }

    public function studentDestroy($id)
    {
        $student = Student::find($id);
        $student->delete();
        return redirect('ats/preliminary_application');
    }
}
