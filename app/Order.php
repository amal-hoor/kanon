<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable=['user_id','consult_id','status','is_free'];

    public function user(){
        return $this->belongsTo('App\User');
    }

    public function consult(){
        return $this->belongsTo('App\Consult');
    }
}
