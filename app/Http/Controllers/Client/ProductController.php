<?php
namespace App\Http\Controllers\Client;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Product;
use DB;
use App\Quotation;
use App\Http\Controllers\DeleteImageController;
use App\ProductCategory;
use App\MoreImagesProduct;
use Auth;
use App\Helper\MyTrait;
use Illuminate\Support\Facades\File;

class ProductController extends Controller
{
    public function Detail($metetitle, $id)
    {

        // dd($id);

        $product = Product::find($id);
        $productWithCategoryID = Product::where('categoryID',$product->categoryID)->get();

        $imageOfProducts = $product->moreImages;
        

        // $moreimage = $product->MoreImages;
        // $arrayimg = explode(',', $moreimage);
        //dd($array);
        return view('Pront.Product.Detail', ['product' => $product, 'proSameCateID'=>$productWithCategoryID, 'imageOfProducts'=>$imageOfProducts]);
    }
     public function show()
    {
        
        $product = DB::table('product')->orderBy('ID', 'desc')->paginate(5);
        //dd($category);

        $catename = array();

        foreach ($product as $cnte)
        {
            $catename[] = ProductCategory::find($cnte->categoryID);
        }
        //$cus_model = DB::table('Content')->join('Product','Product.categoryID','=', 'ProductCategory.ID')->select('Content.*', 'Category.Name')->get();


        //dd($catename);
        return view('Admin.Product.Index', ['product' => $product]);
    }

    // public function getcreate()
    // {
    //     //dd("shsh");

    //     $data = ProductCategory::all();
    //     //return view('Admin.Product.Create')->with($data);
    //     return view('Admin.Product.Create', ['data' => $data]);
    // }

    public function postcreate(Request $request)
    {
        // dd($request);
        $product = new Product;
        // $product->Name = $request->Name;
        // $product->categoryID = $request->categoryID;
        // $product->Detail = $request->Detail;
        //dd($request->categoryID);
        if($request->filepath != null)
        {
            //$imageName = time().'.'.$request->Image->getClientOriginalExtension();
            //$request->Image->move(public_path('upload'), $imageName);
            $imageName = $request->filepath;
            $product->Image    = $imageName;
        }

        // $product->Image    = $request->filepath;
        //dd($product->Image);


        //$res = DB::insert('insert into Content (Name, Image, categoryID, Detail) values (?, ?, ?, ?)', [$request->Name, $request->Image, $request->categoryID, $request->Detail]);



        // $product->user_id = Auth::user()->id;
        if($request->filepath22 != null)
        {
            $imageNames = explode(",",$request->filepath22);
            
        }
        $data = array(
           'Name'  => $request->Name,
           'MetaTitle' => changeTitle($request->Name),
           'categoryID'   => $request->categoryID,
           'Detail'  => $request->Detail,
           'Image'   => $imageNames[0],
           'user_id' => Auth::user()->id,
           'Price'   => $request->Price,
           'Detail'   => $request->Detail,
           'district_id'   => $request->district_id,
           'state'   => $request->State
        );

        $proid = Product::create($data);
        // $product->save();
        //dd($proid);
        if($request->filepath22 != null)
        {
            
            
            foreach ($imageNames as $key => $value) {
                $moreimages = new MoreImagesProduct;
                $moreimages->image = $value;
                $moreimages->product_id = $proid->id;
                $moreimages->save();
            }
        }

        //if($res > 0){
        //    return redirect()->action('ContentController@show');
        // }
        //return redirect('Admin/Category/Create');
        $catename = ProductCategory::find($product->categoryID);
        return redirect()->action('Admin\ProductController@show', ['catename'=> $catename]);

    }

    
    public function getedit($id)
    {
        //dd($id);
        $product = Product::find($id);
        //dd($content);
        $data = ProductCategory::all();
        $categoryname = $data->where('ID', $product->categoryID);

        foreach($categoryname as $index => $item)
        {
            $cate = $item;
        }
            
        
        //dd($cate);
        return view('Admin.Product.Edit', ['product' => $product, 'data'=>$data, 'cate'=>$cate]);
        
    }

    public function postedit(Request $request, $id)
    {


        $product = Product::find($id);
        //dd($category);
        $product->Name = $request->Name;

        //$product->Description = $request->Description;
        $product->Detail = $request->details;
        $product->categoryID = $request->categoryID;
        //dd($product->categoryID);
        if($request->filepath != null)
        {
            //$imageName = time().'.'.$request->Image->getClientOriginalExtension();
            //$request->Image->move(public_path('upload'), $imageName);
            
            $product->Image    = $request->filepath;
           
        }

        
        //dd($product->Image);
        if($request->filepath1 != null)
        {
            //dd($imageName);
            $product->MoreImages    = $request->filepath1;
        }



        $res = DB::update('update Product set Name = ?, Detail = ?, Image = ?, MoreImages=?,categoryID=? where ID = ?',
            [
                $product->Name,
                $product->Detail,
                $product->Image,
                $product->MoreImages,
                $product->categoryID,
                $product->ID
            ]);
        //$category->save();
        if($res > 0)
        {
            echo "update thanh cong";
        }
        else {
            echo "update KO thanh cong";
        }

        return redirect()->action('Admin\ProductController@show');
    }
    public function getdelete($id)
    {
        //dd($id);
        $product = Product::find($id);

        $imageOfProducts = Product::find($id)->moreImages;


        if($imageOfProducts!=null)
        {
            $myHelper = new MyTrait('image');
            foreach ($imageOfProducts as $key => $value) {
                $moreimage = basename($value->image);
                $moreimageproduct = basename($moreimage);
                // dd($moreimageproduct);
                $file_to_delete = $myHelper->getCurrentPath($moreimageproduct);
                // dd($file_to_delete);
                $thumb_to_delete = $myHelper->getThumbPath($moreimageproduct);
                File::delete($file_to_delete);
                File::delete($thumb_to_delete);

            }
            $moreimagetable = MoreImagesProduct::where('product_id', $product->ID);
            $moreimagetable->delete();
            // $res = DB::delete('delete from more_images_product product_id = ?', [$product->ID]);
            // dd($moreimagetable);
        }
        if($product->Image!=null)
        {
            $imageproduct = basename($product->Image);
            //Using helper to find iamge path follow os format
            // $myHelper = new MyTrait('image');
            $file_to_delete = $myHelper->getCurrentPath($imageproduct);
            // dd($file_to_delete);
            $thumb_to_delete = $myHelper->getThumbPath($imageproduct);
            File::delete($file_to_delete);
            File::delete($thumb_to_delete);
        }
        
        //dd($content);
        $res = DB::delete('delete from Product where ID = ?', [$product->ID]);
        return redirect()->action('Admin\ProductController@show');
    }
}
