<?php

namespace App\Http\Controllers\Admin;
use DB;
use App\Http\Controllers\Controller;
use App\Quotation;
use Illuminate\Http\Request;
use App\Category;
use Carbon\Carbon;
class CategoryController extends Controller
{
    public function show()
    {
        $category = Category::all();
        //dd($category);
        return view('Admin.Category.Index', ['category' => $category]);
    }

    public function getcreate()
    {
        $data = Category::all();

        //dd("shsh");
        return view('Admin.Category.Create',['data'=>$data]);
    }

    public function postcreate(Request $request)
    {

        //dd($request->Name);
        //dd($request);
        $category = new Category;
        $category->Name = $request->Name;
        //dd($request->ID);
        if($request->ParentID=="Parent ctegory")
        {
            $category->ParentID = null;
        }
        else
        {
            $category->ParentID = $request->ParentID;
        }
        $category->save();

        return $this->show();
         //return redirect()->route('admin.category.index');
    }

    public function getedit($id)
    {
        //dd($id);
        $category = Category::find($id);
        $parentname = Category::find($category->ParentID);
        //dd($category);
        $data = Category::all();
        if($parentname!= null)
        {
            $checkcateparent = true;
        }
        else
        {
            $checkcateparent = false;
        }
        return view('Admin.Category.Edit', ['category' => $category, 'data'=>$data, 'parentid'=>$parentname, 'checkcateparent'=>$checkcateparent]);
    }

    public function postedit(Request $request, $id)
    {
        //$category = Category::find($id);
        //dd($category);
        

        $category = new Category;

        $category->exists = true;
        $category->id = $id; //already exists in database.
        $category->Name = $request->Name;
        $category->ParentID = $request->ParentID;
        $category->save();



        //$res = DB::update('update Category set Name = ?,ParentID = ? where ID = ?', [$category->Name ,$request->ParentID, $category->ID]);
        //$category->save();
        // if($res > 0)
        // {
        //     echo "update thanh cong";
        // }
        // else {
        //     echo "update KO thanh cong";
        // }
        //return redirect('Admin/Category/Edit');
        return $this->show();
         //return redirect()->route('admin.category.index');
        
    }
    public function getdelete($id)
    {

        //dd($id);
        //$category = Category::find($id);
        //$res = DB::table('Category')->where('ID',$id)->delete();
        $category = new Category;

        $category->exists = true;
        $category->id = $id;
        $category->delete();
        //dd($res);
        //$res = DB::delete('delete from Category where ID = ?', [$category->ID]);

        $cate = Category::all();
        if($cate->count() == 0)
        {

            $res = DB::statement('alter TABLE Category AUTO_INCREMENT = 1');
        }

        return $this->show();
        //return redirect('category/index');
    }
    public function Active(Request $request)
    {
        $category = Category::find($request->id);

        $category->Status = !$category->Status;
        $res = DB::update('update Category set Status = ? where ID = ?', [$category->Status , $category->ID]);
        
        //dd($category);

        return ['status'=>$category->Status, 'data'=>$category];
    }
}

