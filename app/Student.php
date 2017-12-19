<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Student extends Model
{
    protected $guarded = [];

    public function applicationFile(){
        return $this->hasOne('App\ApplicationFile');
    }

    public function batch(){
        return $this->hasOne('App\Batch');
    }

    public function notes(){
        return $this->hasMany('App\Note');
    }

    public function getFirstNameAttribute($value){
        return $value . ' ' .$this->middle_name . ' ';
    }

    public function getFullInfo(){
        return $this->first_name . ' ' . $this->last_name . ' (' . $this->sex . ') - ' . $this->schoolName . ' | ' .$this->district;
    }

    public function getEltisScore(){
        $scoreSheet = ScoreSheet::where('stage_id', 3)->where('student_id', $this->id)->first();
        if($scoreSheet){
            return $scoreSheet->score;
        }else{
            return 0;
        }
    }

    public function finalInterviewTime(){
        $slot = FinalInterviewSlot::where('student_1', $this->id)
            ->orWhere('student_2', $this->id)
            ->orWhere('student_3', $this->id)
            ->orWhere('student_4', $this->id)
            ->orWhere('student_5', $this->id)
            ->orWhere('student_6', $this->id)->first();

        if($slot){
            return "Reporting Time: " . $slot->reporting_time->toDateTimeString() . " End Time: " . $slot->individual_6_end_time->toTimeString() ;
        }else{
            return "No slot allocated";
        }
    }

    public function saveEltisScore($score){
        $scoreSheet = ScoreSheet::where('stage_id', 3)->where('student_id', $this->id)->first();
        if($this->district == "DHAKA"){
            $threshold = Constant::where('key', 'ELTiS Qualifying Mark Dhaka')->first()->value;
        }else{
            $threshold = Constant::where('key', 'ELTiS Qualifying Mark Outside Dhaka')->first()->value;
        }
        if($score >= $threshold){
            $passed = true;
            $this->stage = 4;
            $this->save();
        }else{
            $this->stage = 3;
            $passed = false;

        }
        if($scoreSheet){
            $scoreSheet->score = $score;
            $scoreSheet->has_passed = $passed;
            $scoreSheet->save();
            ActionLog::create(['action_id' => '13', 'action_by_user_id' => Auth::user()->id, 'action_on_student_id' => $this->id, 'content' => 'none']);
        }else{
            ScoreSheet::create([
                'score' => $score,
                'student_id' => $this->id,
                'stage_id' => 3,
                'has_passed' => $passed,
                'has_withdrawn' => 0,
                'score_account_id' => 1,
            ]);
            ActionLog::create(['action_id' => '12', 'action_by_user_id' => Auth::user()->id, 'action_on_student_id' => $this->id, 'content' => 'none']);
        }
    }
}
