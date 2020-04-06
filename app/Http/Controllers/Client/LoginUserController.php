<?php

namespace App\Http\Controllers\Client;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Validator;
use Auth;
use DB;
use Session;
class LoginUserController extends Controller
{
    public function postLogin(Request $request) {
	    // Kiểm tra dữ liệu nhập vào
	    //dd($request->password);
	    
	    $rules = [
	        'email' =>'required|email',
	        'password' => 'required|min:8'
	    ];
	    $messages = [
	        'email.required' => 'Email là trường bắt buộc',
	        'email.email' => 'Email không đúng định dạng',
	        'password.required' => 'Mật khẩu là trường bắt buộc',
	        'password.min' => 'Mật khẩu phải chứa ít nhất 8 ký tự',
	    ];
	    $validator = Validator::make($request->all(), $rules, $messages);
	    
	    
	    if ($validator->fails()) {
	    	//dd("fail");
	        // Điều kiện dữ liệu không hợp lệ sẽ chuyển về trang đăng nhập và thông báo lỗi
	        return redirect('/')->withErrors($validator)->withInput();
	    } else {
	        // Nếu dữ liệu hợp lệ sẽ kiểm tra trong csdl
	        $email = $request->input('email');
	        $password = $request->input('password');
	        //dd($email);
	        if( Auth::attempt(['email' => $email, 'password' =>$password])) {
	        		$res = DB::update('update users set last_sign_in_at = ? where id = ?',
		            [
		                \Carbon\Carbon::now()->toDateTimeString(),
		                Auth::user()->id
		            ]);
	                return redirect('/');
	            
	            
	        } else {
	            // Kiểm tra không đúng sẽ hiển thị thông báo lỗi
	            Session::flash('error', 'Email hoặc mật khẩu không đúng!');
	            return redirect('/');
	            
	        }
	    }
	}
}
