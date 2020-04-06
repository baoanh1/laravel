<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
class HomeController extends Controller
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

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */

    public function index(Request $request)
    {
        if (Auth::user()->hasRole('user')) {
            return redirect('/');
        }

        elseif (Auth::user()->hasRole('admin')) {
            
            return redirect('admin');
        }else{}
    }
    public function chatIndex()
    {
        return view('home');
    }
}
