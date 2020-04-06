<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Validator;
use Auth;
use DB;
use Session;
class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/admin/index';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
        
    }
    // protected function loggedOut() {
    //     return redirect('admin/login');
    // }
    public function login(Request $request) {
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
            return redirect('admin/login')->withErrors($validator)->withInput();
        } else {
            // Nếu dữ liệu hợp lệ sẽ kiểm tra trong csdl
            $email = $request->input('email');
            $password = $request->input('password');
            //dd($email);
            if( Auth::attempt(['email' => $email, 'password' =>$password])) {
               
                if (Auth::user() &&  Auth::user()->hasRole('admin'))
                {
                    
                    return redirect('admin/index');
                }
                else
                {
                    return redirect('/');
                }
                
            } else {
                // Kiểm tra không đúng sẽ hiển thị thông báo lỗi
                Session::flash('error', 'Email hoặc mật khẩu không đúng!');
                return redirect('/');
                
            }
        }
    }
    public function logout() 
    {
        $res = DB::update('update users set last_log_out_at = ? where id = ?',
            [
                \Carbon\Carbon::now()->toDateTimeString(),
                Auth::user()->id
            ]);
        if (Auth::user() &&  Auth::user()->hasRole('admin'))
        {
            Auth::logout();
            return redirect('admin/login');
        }
        else
        {
           Auth::logout();
            return redirect('/');
        }
        
    }

}
