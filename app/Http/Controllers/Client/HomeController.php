<?php

namespace App\Http\Controllers\Client;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Product;
use App\ProductCategory;
use App\Promo;
use App\Quotation;
use Carbon\Carbon;
class HomeController extends Controller
{
    public function show()
    {
        // $start_time = Product::find(67)->CreatedDate;

        // $time = gettime($start_time);
        // if(array_key_exists("hours",$time))
        // {
        //     dd($time);
        // }
        
        $product = Product::all();
        $cate = ProductCategory::all();
        $data = Product::paginate(2);
        // $promo = Promo::find(1);
        $imageOfProducts = array();
        foreach ($product as $item) {
            array_push($imageOfProducts, $item->moreImages);
        }
        // $districtname = Product::find(67)->districts->provinces;
        // dd($districtname);
        $time = array();
        foreach ($product as $item) {
            array_push($time,gettime($item->CreatedDate));
        }
         
        // dd($imageOfProducts);
        //dd($product);
        return view('Pront.Home.Index', ['product' => $product, 'images'=>$imageOfProducts, 'category'=>$cate,'data'=>$data]);
    }
    
}
