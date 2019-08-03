<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Consult extends Model
{
    protected $fillable=['content','question','category_id','price'];

    public function category(){
        return $this->belongsTo('App\Category');
    }

    public function users(){
        return $this->belongsToMany('App\User','orders')->withpivot('status');
    }

}
