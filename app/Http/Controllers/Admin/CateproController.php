<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use Auth;
use App\Quotation;
use App\ProductCategory;
use Carbon\Carbon;
use App\Http\Requests\categoryRequest;
class CateproController extends Controller
{
    public function show()
    {
        
        $category = ProductCategory::select('ID','Name','MetaTitle','ParentID','Status','image')->orderBy('ID','DESC')->get();
        
        return view('Admin.ProductCategory.Index', ['category' => $category]);
    }

    public function getcreate()
    {
        $data = ProductCategory::select('ID','Name','ParentID')->get()->toArray();

        //dd($data);
        return view('Admin.ProductCategory.Create',compact('data'));
    }

    public function postcreate(categoryRequest $request)
    {

        //dd($request->Name);
        //dd($request);
        $category = new ProductCategory;
        $category->Name = $request->Name;
        //dd($request->ID);
        $category->MetaTitle = changeTitle($request->Name);
        if($request->filepath != null)
        {
            //$imageName = time().'.'.$request->Image->getClientOriginalExtension();
            //$request->Image->move(public_path('upload'), $imageName);
            $imageName = $request->filepath;
            $category->image    = $imageName;
        }else{
            $category->image = "";
        }
        $category->ParentID = $request->ParentID;
        //dd($category);
        $category->save();
        return redirect()->route("admin.catepro.index")->with(['className'=>'success','notify'=>'Add Category Success']);
        //return $this->show();
    }

    public function getedit($id)
    {
        //dd($id);
        $category = ProductCategory::findOrFail($id);
        
        // dd($category->ParentID);
        $data = ProductCategory::all();
        return view('Admin.ProductCategory.Edit', ['category' => $category, 'data'=>$data]);
    }

    public function postedit(Request $request, $id)
    {
        $this->validate(
            $request,
            ["Name"=>"required"],
            ["Name.required"=>"please enter category name"]
            
        );
        $category = ProductCategory::find($id);
        //dd($category);
        
        $category->Name = $request->Name;
        $res = DB::update('update ProductCategory set Name = ?,MetaTitle=?, ParentID = ?, image=? where ID = ?', [$category->Name ,changeTitle($category->Name), $request->ParentID, $request->filepath, $category->ID]);

        //$category->save();
        if($res > 0)
        {
            echo "update thanh cong";
        }
        else {
            echo "update KO thanh cong";
        }
       
        return redirect()->route("admin.catepro.index")->with(['className'=>'success','notify'=>'edit Category Success']);
    }
    public function getdelete($id)
    {
        if(Auth::user()->hasRole('admin'))
        {
            $cate = ProductCategory::all();
            if($cate->count() == 0)
            {

                $res = DB::statement('alter TABLE ProductCategory AUTO_INCREMENT = 1');
            }
            else
            {
                $res = DB::delete('delete from ProductCategory where ID = ?', [$id]);
            }
            
            
            return redirect()->route("admin.catepro.index")->with(['className'=>'success','notify'=>'delete Category Success']);
            //return $this->show();
        }
        else
        {
            echo "<script type='text/javascript'>
                alert('Sorry ! you can not delete this user');
                window.location ='";
                echo route('admin.user.show');
                echo"'
            </script>";
        }
        
    }
}
