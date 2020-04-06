<?php

namespace App\Http\Controllers\Member;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use App\User;
use App\Product;
use DB;
class MembersController extends Controller
{
    public function showProfile()
    {
    	$user_current_login = Auth::user();
    	return view('Member.Member',['user'=>$user_current_login]);
    }
    public function userDetailPage(Request $request)
    {
    	$user = User::findOrFail($request->id);
    	$products = Product::where('user_id',$request->id)->paginate(2);
    	// dd($products);
    	return view('Member.User-Detail-Page',['user'=>$user,'products'=>$products]);
    }
}
