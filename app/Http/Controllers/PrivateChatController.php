<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Events\PrivateMessageEvent;
use App\User;
use App\Product;
use Auth;
use App\Models\ChatRoom;
use App\Models\Message;
use App\Models\Receiver;
use DB;
class PrivateChatController extends Controller
{
	/**
     * Create a new controller instance.
     *
     * @return void
     */
	public function __construct()
	{
		$this->middleware('auth');
	}

    public function get(ChatRoom $chatroom)
    {
        return $chatroom->messages;
    }
    public function getchatroomtodelete()
    {
        $myallchatrooms = ChatRoom::where(['sender_status'=>1])->orWhere(['receiver_status'=>1])->where('user_ids', 'LIKE', '%'.Auth::user()->id.'%')->get();
        
        return $myallchatrooms;
    }
    public function deletechatrooms(Request $request)
    {
        $sender = ChatRoom::where('sender_id',Auth::user()->id)->get();
        $receiver = ChatRoom::where('receiver_id',Auth::user()->id)->get();

        if(count($sender)!=0)
        {
            $res = ChatRoom::whereIn('id',$request->items)->where('sender_id',Auth::user()->id)->update(['sender_status'=>0]);
        }
        if(count($receiver)!=0){
            $res = ChatRoom::whereIn('id',$request->items)->where('receiver_id',Auth::user()->id)->update(['receiver_status'=>0]);
        }
        
        return $res;
    }
    public function getMessages()
    {
        $chatroom = ChatRoom::where('receiver_id', Auth::user()->id)->where('receiver_status',1)->get();
        
        $mes = Message::whereIn('chat_room_id',$chatroom->id)->get();
        
        $mesWithStatus1 = array();
        foreach($mes as $key => $value) {
            
            if($value->status)
            {
                array_push($mesWithStatus1,$value);
            }
        }
        return count($mesWithStatus1);
    }
    public function index($receiverId=null, $proid=null)
    {
        
        
        $receiver = User::find($receiverId);
        $senderUserId = auth()->user()->id;
        $roomMembers = [$receiverId, $senderUserId];
        sort($roomMembers);
        $roomMembers = implode($roomMembers, ',');
        
        $chatRoom = ChatRoom::where('user_ids', $roomMembers)->where(['sender_status'=>1])->orWhere(['receiver_status'=>1])->first();


        if(is_null($chatRoom)) {
            $chatRoom = new ChatRoom;
            $chatRoom->room_type = 'private';
            $chatRoom->user_ids = $roomMembers;
            $chatRoom->receiver_id = $receiverId;
            $chatRoom->sender_id = $senderUserId;
            $chatRoom->product_id = $proid;
            $chatRoom->save();
        }
        
        // $ids = User::find(Auth::user()->id)->products->toArray();
        
        // dd($ids);
        $myreceivechatrooms = ChatRoom::where(['receiver_id'=>Auth::user()->id,'receiver_status'=>1])->get();
        
        $mysendchatrooms = ChatRoom::where(['sender_id'=>Auth::user()->id,'sender_status'=>1])->get();
        // dd($mysendchatrooms);
        $myallchatrooms = ChatRoom::where(['sender_status'=>1])->orWhere(['receiver_status'=>1])->where('user_ids', 'LIKE', '%'.Auth::user()->id.'%')->get();
        
        return view('private-chat.form', compact('chatRoom', 'receiver','proid','myreceivechatrooms', 'mysendchatrooms','myallchatrooms','senderUserId'));
    }

    public function getdata($receiverId=null, $proid=null)
    {
        echo $receiverId;
        $receiver = User::find($receiverId);
        $senderUserId = auth()->user()->id;
        $roomMembers = [$receiverId, $senderUserId];
        sort($roomMembers);
        $roomMembers = implode($roomMembers, ',');
        
        $chatRoom = ChatRoom::where('user_ids', $roomMembers)->first();


        if(is_null($chatRoom)) {
            $chatRoom = new ChatRoom;
            $chatRoom->room_type = 'private';
            $chatRoom->user_ids = $roomMembers;
            
            $chatRoom->product_id = $proid;
            $chatRoom->save();
        }
        
        $ids = User::find(Auth::user()->id)->products->toArray();
        
        
        $$myreceivechatrooms = ChatRoom::where(['receiver_id'=>Auth::user()->id,'receiver_status'=>1])->get();
        
        $mysendchatrooms = ChatRoom::where(['sender_id'=>Auth::user()->id,'sender_status'=>1])->get();
        // dd($mysendchatrooms);
        $myallchatrooms = ChatRoom::where(['sender_status'=>1,'receiver_status'=>1])->where('user_ids', 'LIKE', '%'.Auth::user()->id.'%')->get();
        
        return view('private-chat.detail-chat-box', compact('chatRoom', 'receiver','proid','myreceivechatrooms','mysendchatrooms','myallchatrooms'));
    }

    public function store(ChatRoom $chatroom)
    {
        $senderId = auth()->user()->id;
        $roomMembers = collect(explode(',', $chatroom->user_ids));
        $roomMembers->forget($roomMembers->search($senderId));
        $receiverId = $roomMembers->first();

        $message = new Message;
        $message->chat_room_id = $chatroom->id;
        $message->sender_id = $senderId;
        $message->message = request('message');
        $message->save();

        $receiver = new Receiver;
        $receiver->message_id = $message->id;
        $receiver->receiver_id = $receiverId;

        if($receiver->save()) {
            $message = Message::with('sender')->find($message->id);
            broadcast(new PrivateMessageEvent($message))->toOthers();
            return $message;
        } else {
            return 'Something went wrong!!';
        }
    }
    public function listChat()
    {
        $ids = User::find(Auth::user()->id)->products->toArray();
        
        
        $myreceivechatrooms = ChatRoom::where(['receiver_id'=>Auth::user()->id,'receiver_status'=>1])->get();
        // dd($myreceivechatrooms);
        $mysendchatrooms = ChatRoom::where(['sender_id'=>Auth::user()->id,'sender_status'=>1])->get();
        // dd($mysendchatrooms);
        $myallchatrooms = ChatRoom::where(['sender_status'=>1])->orWhere(['receiver_status'=>1])->where('user_ids', 'LIKE', '%'.Auth::user()->id.'%')->get();
        // dd($myallchatrooms);
        return view('private-chat.form', compact('myallchatrooms','myreceivechatrooms','mysendchatrooms'));
    }
}
