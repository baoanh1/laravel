<?php

namespace App\Http\Controllers\Client;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use App\Product;
use App\ProductCategory;

class PaginationController extends Controller
{
    function index($id)
    {

        $cates = ProductCategory::all();

        $value = treeCate($cates,10);
        // $value = treeCate($cates,10);
     $data = Product::whereIn('categoryID',$value)->orderBy('id', 'desc')->paginate(2);
     $cate = ProductCategory::all();
     // dd($data);
     $imageOfProducts = array();
        foreach ($data as $item) {
            array_push($imageOfProducts, $item->moreImages);
        }
     return view('Pront.pagination', ['data'=>$data, 'images'=>$imageOfProducts, 'category'=>$cate]);
    }

    function fetch_data(Request $request)
    {
     if($request->ajax())
     {
        $cates = ProductCategory::all();
     	$value = treeCate($cates,10);
        // $value = treeCate($cates,10);
     $data = Product::whereIn('categoryID',$value)->orderBy('id', 'desc')->paginate(2);
      $imageOfProducts = array();
        foreach ($data as $item) {
            array_push($imageOfProducts, $item->moreImages);
        }
      return view('Pront.pagination_data', ['data'=>$data,'images'=>$imageOfProducts]);
     }
    }
}
