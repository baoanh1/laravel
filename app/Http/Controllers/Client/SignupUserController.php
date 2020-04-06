<?php

namespace App\Http\Controllers\Client;

use Illuminate\Http\Request;
use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
class SignupUserController extends Controller
{
    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {

        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    // protected function create(array $data)
    // {
    //     return User::create([
    //         'name' => $data['name'],
    //         'email' => $data['email'],
    //         'password' => Hash::make($data['password']),
    //     ]);
    // }

    protected function postSignup(Request $data)
    {     
        //dd(41414)  
        $user = User::create([
            'name'     => $data['name'],
            'phone'     => "099877655",
            'address'     => "cau giay1",
            'email'    => $data['email'],
            'role'     => "user",
            'password' => bcrypt($data['password']),
        ]);

        $user->roles()->attach(\App\Role::where('name', 'user')->first());

       // return $user;
        // return redirect('/');
        // return redirect()->back()->with('message', "Thanks, message has been sent");
        auth()->login($user);
        return redirect()->route("index")->with(['className'=>'success','notify'=>'You have Successfully Registered with email: '.$user->email]);
        // return redirect('/');
    }
}
