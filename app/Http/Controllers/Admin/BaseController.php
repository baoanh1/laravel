<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests;

class BaseController extends Controller
{
    public function __construct()
    {
    	$res = $this->middleware('auth');
    	//dd($res);
    }
}
