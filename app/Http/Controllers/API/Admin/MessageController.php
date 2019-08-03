<?php

namespace App\Http\Controllers\API\Admin;

use App\Message;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MessageController extends Controller
{
    public function index(Request $request)
    {
        $messages = Message::with('user')->where('conversation_id', $request->input('id'))->get();
        return response()->json(['status' => 200, 'data' => $messages]);
    }

}
