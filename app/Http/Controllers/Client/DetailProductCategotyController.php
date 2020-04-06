<?php

namespace App\Http\Controllers\Client;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Product;

class DetailProductCategotyController extends Controller
{
    public function show($id)
    {
    	
        $product = Product::where('categoryID', $id)->get();
        //dd($product);
        return view('Pront.Home.DetailProCategory', ['product' => $product]);
    }
}
