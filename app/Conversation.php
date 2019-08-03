<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Conversation extends Model
{
    protected $fillable=['user_id','admin_id'];

    public function admin(){
        return $this->belongsTo('App\User','admin_id');
    }

    public function user(){
        return $this->belongsTo('App\User','user_id')->with('photo');
    }

    public function Messages(){
        return $this->hasMany('App\Message');
    }
}
