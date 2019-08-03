<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    protected $fillable = ['content', 'conversation_id', 'user_id'];

    public function conversations()
    {
        return $this->belongsTo('App\Conversation', 'conversation_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id')->with('photo');
    }
}
