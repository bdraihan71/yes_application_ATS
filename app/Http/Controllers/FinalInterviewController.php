<?php

namespace App\Http\Controllers;

use App\Constant;
use App\FinalInterviewSlot;
use App\Student;
use PDF;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;

class FinalInterviewController extends Controller
{
    public function home(){

        $unsuccessful  = Student::where('stage',5)->get();
        $successful  = Student::where('stage','>', 5)->get();

        return view('ats.final-interview.home', compact('unsuccessful', 'successful'));

        // $score_sheets_passed = DB::table('score_sheets')->where('score_account_id', 1)->where('stage_id', 5)->where('has_passed', true)->get();
        // $student_ids_passed = array_pluck($score_sheets_passed, 'student_id');
        // $students_passed = Student::whereIn('id', $student_ids_passed)->get();

        // $score_sheets_failed = DB::table('score_sheets')->where('score_account_id', 1)->where('stage_id', 5)->where('has_passed', false)->get();
        // $student_ids_failed = array_pluck($score_sheets_failed, 'student_id');
        // $students_failed = Student::whereIn('id', $student_ids_failed)->get();

        // $query = Student::where('batch_id',  env('AKASH_BATCH'))->where('stage','>', 4)->whereNotIn('id',array_merge($student_ids_passed, $student_ids_failed));
        // $not_scored_count = $query->count();
        // $not_scored = $query->get();

        // return view('ats.final-interview.home', compact('students_passed', 'students_failed', 'not_scored', 'not_scored_count'));
    }

    public function interviewSchedule(){
        $final_interview_slots = FinalInterviewSlot::all();
        return view('ats.final-interview.interview-schedule', compact('final_interview_slots'));
    }

    public function addSlot(Request $request){
        $format = "yyyy-mm-ddThh:mm";
        $reporting_time = new Carbon($request->datetime);
        FinalInterviewSlot::create([
            'reporting_time' => $reporting_time->format('Y-m-d H:i:s'),
            'group_interview_start_time' => $reporting_time->addMinute(20)->format('Y-m-d H:i:s'),
            'group_interview_end_time' => $reporting_time->addMinutes(30)->format('Y-m-d H:i:s'),
            'individual_1_start_time' => $reporting_time->addMinutes(20)->format('Y-m-d H:i:s'),
            'individual_1_end_time' => $reporting_time->addMinutes(10)->format('Y-m-d H:i:s'),
            'individual_2_start_time' => $reporting_time->format('Y-m-d H:i:s'),
            'individual_2_end_time' => $reporting_time->addMinutes(10)->format('Y-m-d H:i:s'),
            'individual_3_start_time' => $reporting_time->format('Y-m-d H:i:s'),
            'individual_3_end_time' => $reporting_time->addMinutes(10)->format('Y-m-d H:i:s'),
            'individual_4_start_time' => $reporting_time->format('Y-m-d H:i:s'),
            'individual_4_end_time' => $reporting_time->addMinutes(10)->format('Y-m-d H:i:s'),
            'individual_5_start_time' => $reporting_time->format('Y-m-d H:i:s'),
            'individual_5_end_time' => $reporting_time->addMinutes(10)->format('Y-m-d H:i:s'),
            'individual_6_start_time' => $reporting_time->format('Y-m-d H:i:s'),
            'individual_6_end_time' => $reporting_time->addMinutes(10)->format('Y-m-d H:i:s'),
        ]);
        $request->session()->flash('message', 'Final interview slot created');
        return redirect()->back();
    }

    public function deleteSlot(Request $request){
        FinalInterviewSlot::find($request->slot_id)->delete();

        $request->session()->flash('message', 'Final interview slot deleted');
        return redirect()->back();
    }

    public function showSlot(Request $request, FinalInterviewSlot $slot){
        $students1 = FinalInterviewSlot::pluck('student_1')->toArray();
        $students2 = FinalInterviewSlot::pluck('student_2')->toArray();
        $students3 = FinalInterviewSlot::pluck('student_3')->toArray();
        $students4 = FinalInterviewSlot::pluck('student_4')->toArray();
        $students5 = FinalInterviewSlot::pluck('student_5')->toArray();
        $students6 = FinalInterviewSlot::pluck('student_6')->toArray();

        $students_id = array_merge($students1, $students2, $students3, $students4, $students5, $students6);
        $students_id = array_filter($students_id);
        $students = Student::where('stage', 5 )
            ->whereNotIn('id', $students_id)->orderBy('first_name')
            ->get();
            dd($students);
        return view('ats.final-interview.slot.show', compact('slot', 'students'));
    }

    public function assign(Request $request, FinalInterviewSlot $slot){
        $values = array_values($request->all());
        $d = [];
        foreach ($values as $value){
            if($value == "0"){

            }else{
                array_push($d, $value);
            }
        }
        if(count(array_unique($d)) != count($d)){
            $request->session()->flash('message', 'Sorry, You assigned one person in two time frame');
            return redirect()->back();
        }
        $slot->update($request->all());
        $request->session()->flash('message', 'Slot Updated.');
        return redirect()->back();
    }

    public function invitation(){
        $students = Student::where('batch_id',  env('AKASH_BATCH'))->where('stage','>',4)->orderBy('final_id')->get();
        return view('ats.final-interview.pdf.letter', compact('students'));
    }

    public function parent(){
        $students = Student::where('batch_id',  env('AKASH_BATCH'))->where('stage','>',4)->orderBy('first_name')->get();
        return view('ats.final-interview.parent', compact('students'));
    }

    public function processParent(Request $request){
        foreach ($request->parent as $key=>$value){
            $student = Student::find($key);
            $student->parent_for_interview = $value;
            $student->save();
        }
        $request->session()->flash('message', 'Parent name updated');
        return redirect()->back();
    }

    public function group(){
        $slots = FinalInterviewSlot::all();
        return view('ats.final-interview.pdf.group', compact('slots'));
    }

    public function individual($interviewer){
        $interviewer = Constant::where('key', "Individual Interviewer ".$interviewer)->first()->value;
        $students = Student::where('batch_id',  env('AKASH_BATCH'))->where('stage','>',4)->orderBy('final_id')->get();
        return view('ats.final-interview.pdf.individual', compact('students','interviewer'));
    }

    public function envelope(){
        $students = Student::where('batch_id',  env('AKASH_BATCH'))->where('stage','>',4)->orderBy('final_id')->get();
        return view('ats.final-interview.pdf.envelope', compact('students'));
    }

    public function idcard(){
        $students = Student::where('batch_id',  env('AKASH_BATCH'))->where('stage','>',4)->orderBy('final_id')->get();
        return view('ats.final-interview.pdf.idcard', compact('students'));
    }

    public function parentIdcard(){
        $students = Student::where('batch_id',  env('AKASH_BATCH'))->where('stage','>',4)->orderBy('final_id')->get();
        return view('ats.final-interview.pdf.parent-idcard', compact('students'));
    }

    public function registration(){
        $students = Student::where('batch_id',  env('AKASH_BATCH'))->where('stage','>',4)->orderBy('final_id')->get();
        return view('ats.final-interview.pdf.registration', compact('students'));
    }

    public function schedule(){
        $slots = FinalInterviewSlot::all();
    // dd($slots);
        return view('ats.final-interview.pdf.schedule', compact('slots'));
    }

    public function parentQuestionnaire(){
        $students = Student::where('batch_id',  env('AKASH_BATCH'))->where('stage','>',4)->orderBy('final_id')->get();
        return view('ats.final-interview.pdf.parentQuestionnaire', compact('students'));
    }

    public function scheduleGroup(){
        $slots = FinalInterviewSlot::orderBy('reporting_time')->get();
        return view('ats.final-interview.pdf.scheduleGroup', compact('slots'));
    }

    public function security(){

        $students = Student::where('batch_id',  env('AKASH_BATCH'))->where('stage','>',4)->orderBy('final_id')->get();


        Excel::create('Filename', function ($excel) use ( $students) {

            $excel->sheet('Sheetname', function ($sheet) use ( $students) {

                $sheet->loadView('ats.final-interview.excel.security', compact('students'));
            });

        })->download('xls');

        return redirect()->back();
    }

    public function contactInformationGroup(){
        $slots = FinalInterviewSlot::orderBy('reporting_time')->get();
        return view('ats.final-interview.pdf.contactGroup', compact('slots'));
    }

    public function hfletterScoresheet(){
        $students = Student::where('batch_id',  env('AKASH_BATCH'))->where('stage','>',4)->orderBy('final_id')->get();
        return view('ats.final-interview.pdf.hfletter-scoresheet', compact('students'));
    }

    public function teacherRecommendationScoresheet(){
        $students = Student::where('batch_id',  env('AKASH_BATCH'))->where('stage','>',4)->orderBy('final_id')->get();
        return view('ats.final-interview.pdf.teacher-recommendation-scoresheet', compact('students'));
    }

    public function activityAchievementScoresheet(){
        $students = Student::where('batch_id',  env('AKASH_BATCH'))->where('stage','>',4)->orderBy('final_id')->get();
        return view('ats.final-interview.pdf.activity-achievement-scoresheet', compact('students'));
    }

    public function overallAppraisalScoresheet(){
        $students = Student::where('batch_id',  env('AKASH_BATCH'))->where('stage','>',4)->orderBy('final_id')->get();
        return view('ats.final-interview.pdf.overall-appraisal-scoresheet', compact('students'));
    }

    public function publish(){
        $students = Student::where('batch_id',  env('AKASH_BATCH'))->where('stage','>', 4)->orderBy('final_id')->get();

        $pdf = PDF::loadView('ats.final-interview.pdf.result', compact('students'));

        return $pdf->download(env('AKASH_PDF_FINAL_RESULT_NAME')); 

    }

    public function scoreSheet(){
        $students = Student::where('batch_id',  env('AKASH_BATCH'))->where('stage','>',4)->orderBy('final_id')->get();
        return view('ats.final-interview.score-sheet', compact('students'));
    }

    public function processScoreSheet(Request $request){
        $students = Student::whereIn('stage', [5, 6, 7])->get();
        foreach($students as $student){
            $student->stage = $request[$student->id];
            $student->save();
        }
        $request->session()->flash('message', 'Updated!');
        return redirect()->back();
    }
}
