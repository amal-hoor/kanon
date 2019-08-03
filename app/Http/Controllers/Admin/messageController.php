<?php

namespace App\Http\Controllers\Admin;

use App\Conversation;
use App\Message;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class messageController extends Controller
{
    public function index()
    {
        $users=User::where('role_id','!=',1)->get();
        return view('admin.message.index',compact('users'));
    }

    public function store(request $request){
        //return $request->all();
        $user=auth()->user();
        $conversation=Conversation::create(['admin_id'=>auth()->user()->id]);
        Message::create([
            'conversation_id' => $conversation->id,
            'content'         => $request->input('content'),
        ]);

        return back();
    }

}
