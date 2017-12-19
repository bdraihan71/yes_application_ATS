<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FinalInterviewDay extends Model
{
    protected $guarded = [];

    public function slots(){
        return $this->hasMany(FinalInterviewSlot::class);
    }
}
