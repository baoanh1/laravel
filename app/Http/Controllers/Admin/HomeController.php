<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests;
use Auth;

class HomeController extends Controller
{
	
	
    public function getIndex()
    {
        
    	if (Auth::user() &&  Auth::user()->hasRole('admin'))
    	{    		
    		return view('Admin.Home.Index');
    	}
        elseif(!Auth::check())
        {
            return redirect('admin/login');
        }
    	return redirect()->route('index');
    	
    }
}
