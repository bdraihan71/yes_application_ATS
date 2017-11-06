<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ActionLog extends Model
{
    protected $guarded = [];

    public function action_by_user(){
        return $this->belongsTo('App\User', 'action_by_user_id');
    }

    public function action(){
        return $this->belongsTo('App\Action');
    }
}
