<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

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
}
