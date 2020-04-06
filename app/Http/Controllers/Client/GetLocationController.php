<?php

namespace App\Http\Controllers\Client;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Province;
use App\District;

class GetLocationController extends Controller
{
    
    public function getLacation(Request $request)
    {
    	$districts = District::where('province_id',$request->provinceID)->get();
    	return $districts;
    }
}
