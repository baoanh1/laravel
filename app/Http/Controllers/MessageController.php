<?php

namespace App\Http\Controllers;
use App\Events\PrivateMessage;
use Illuminate\Http\Request;
use Auth;
use App\Message;

class MessageController extends Controller
{
	public function index(Request $request) {

		$messages = Message::where('chatroom_id', $request->input('chatroom_id'))->with('user')->get();
		return $messages;
	}

   	public function store(Request $request) {
    $user = Auth::user();
    
    $message = $user->messages()->create([
        'message' => request()->get('message'),
        'chatroom_id' => request()->get('chatroomId')
    ]);

    broadcast(new PrivateMessage($message, request()->get('chatroomId')))->toOthers();

    return ['status' => 'OK'];
}
}
