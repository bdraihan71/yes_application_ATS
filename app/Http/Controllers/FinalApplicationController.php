<?php

namespace App\Http\Controllers;

use App\FinalInterviewDay;
use App\FinalInterviewSlot;
use App\Student;
use Carbon\Carbon;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\DB;

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

    public function interviewSchedule(){
        $final_interview_slots = FinalInterviewSlot::all();
        return view('ats.final.interview-schedule', compact('final_interview_slots'));
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
        $students = Student::where('stage', 4 )
            ->whereNotIn('id', $students_id)->orderBy('first_name')
            ->get();
        return view('ats.final.slot.show', compact('slot', 'students'));
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
        $students = Student::where('batch_id',  env('AKASH_BATCH'))->where('stage','>',3)->orderBy('applicant_id')->get();
        return view('ats.final.pdf.letter', compact('students'));
    }

    public function parent(){
        $students = Student::where('batch_id',  env('AKASH_BATCH'))->where('stage','>',3)->orderBy('first_name')->get();
        return view('ats.final.parent', compact('students'));
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
}
