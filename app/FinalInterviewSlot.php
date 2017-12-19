<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FinalInterviewSlot extends Model
{
    protected $guarded = [];

    protected $dates = [
        'reporting_time',
        'group_interview_start_time',
        'group_interview_end_time',
        'individual_1_start_time',
        'individual_2_start_time',
        'individual_3_start_time',
        'individual_4_start_time',
        'individual_5_start_time',
        'individual_6_start_time',
        'individual_1_end_time',
        'individual_2_end_time',
        'individual_3_end_time',
        'individual_4_end_time',
        'individual_5_end_time',
        'individual_6_end_time',
    ];

    public function getStudent_1(){
        return $this->hasOne(Student::class, 'id', 'student_1');
    }

    public function getStudent_2(){
        return $this->hasOne(Student::class, 'id', 'student_2');
    }
    public function getStudent_3(){
        return $this->hasOne(Student::class, 'id', 'student_3');
    }
    public function getStudent_4(){
        return $this->hasOne(Student::class, 'id', 'student_4');
    }
    public function getStudent_5(){
        return $this->hasOne(Student::class, 'id', 'student_5');
    }
    public function getStudent_6(){
        return $this->hasOne(Student::class, 'id', 'student_6');
    }

}
