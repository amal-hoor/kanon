<?php

namespace App\Http\Controllers\API\Admin;

use App\Conversation;
use App\Message;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ConversationController extends Controller
{
    public function index(Request $request)
    {
        $conversations_id = Message::latest()->pluck('conversation_id')->unique()->toArray();
        $conversations = Conversation::whereIn('id' , $conversations_id)->with('user' , 'admin')->get();
        return response()->json(['status' => 200 , 'data' => $conversations]);
    }
}
