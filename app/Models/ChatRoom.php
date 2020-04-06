<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ChatRoom extends Model
{
	protected $fillable = [
	'room_type', 'user_ids','receiver_id','sender_id','product_id'
	];

 	/**
 	* Get the messages of a chat room
 	*/
 	public function messages()
 	{
 		return $this->hasMany('App\Models\Message', 'chat_room_id')->with('sender');
 	}
 	public function product()
 	{
 		return $this->belongsTo('App\Product', 'product_id', 'id');
 	}
 }
