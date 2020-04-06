<?php

namespace App\Http\Controllers\Admin;
use DB;
use App\Http\Controllers\Controller;
use App\Quotation;
use Illuminate\Http\Request;
use App\Category;
use App\Content;

class ContentController extends Controller
{
    public function show()
    {

        $content = Content::paginate(4);
        //dd($category);

        //$catename = array();
        //foreach ($content as $cnte)
        //{
       //     $catename[] = Category::find($cnte->categoryID);
       // }
        //$cus_model = DB::table('Content')->join('Content','Content.categoryID','=', 'Category.ID')->select('Content.*', 'Category.Name')->get();


        //dd($content[0]->category->Name);
        return view('Admin.Content.Index', ['content' => $content]);
    }

    public function getcreate()
    {
        //dd("shsh");

        $data = Category::all();
        //return view('Admin.Content.Create')->with($data);
        return view('Admin.Content.Create', ['data' => $data]);
    }

    public function postcreate(Request $request)
    {

        //dd($request->Name);
        //dd($request);
        $content = new Content;
        $content->Name = $request->Name;
        $content->categoryID = $request->categoryID;
        $content->Detail = $request->Detail;
        //dd($request->categoryID);
        if($request->hasFile('Image'))
        {
            $imageName = time().'.'.$request->Image->getClientOriginalExtension();
            $request->Image->move(public_path('upload'), $imageName);

            $content->Image    = $imageName;
        }


        //$res = DB::insert('insert into Content (Name, Image, categoryID, Detail) values (?, ?, ?, ?)', [$request->Name, $request->Image, $request->categoryID, $request->Detail]);




        $content->save();

        //if($res > 0){
        //    return redirect()->action('ContentController@show');
       // }
        //return redirect('Admin/Category/Create');
        $catename = Category::find($content->categoryID);
        return $this->show();
        //return redirect()->action('ContentController@show', ['catename'=> $catename]);
    }

    public function getedit($id)
    {
        //dd($id);
        $content = Content::find($id);
        $category = Category::all();
        //dd($category);
        return view('Admin.Content.Edit', ['content' => $content, 'category'=>$category]);
    }

    public function postedit(Request $request, $id)
    {
        $content = Content::find($id);
        //dd($category);
        $content->Name = $request->Name;
        $content->categoryID = $request->CategoryID;
        $res = DB::update('update Content set Name = ? , categoryID=? where ID = ?', [$content->Name ,$request->CategoryID, $content->ID]);
        //$category->save();
        if($res > 0)
        {
            echo "update thanh cong";
        }
        else {
            echo "update KO thanh cong";
        }

        //return redirect('Admin/Category/Edit');
        return $this->show();
        //return redirect()->action('ContentController@show');
    }
    public function getdelete($id)
    {
        //dd($id);
        $content = Content::find($id);
        //dd($content);
        $res = DB::delete('delete from Content where ID = ?', [$content->ID]);
        return $this->show();
    }
}
