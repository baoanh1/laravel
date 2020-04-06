<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use Crypt;
use auth;
use Hash;
use DB;
use App\Http\Requests\ThanhVienRequest;
class UserController extends Controller
{
    public function show()
    {
        //dd(1);
        //$category = ProductCategory::all();
        $users = User::select('ID','Name','Phone','Address','Email','Level','Status')->orderBy('ID','DESC')->get();
        //dd($users);
        return view('Admin.User.Index', ['users' => $users]);
    }

    public function getcreate()
    {
        $user_current_login = Auth::user();
        return view('Admin.User.Create');
       
        
        
    }

    public function postcreate(Request $request)
    {
        $request->validate([
                'password'              => 'required|confirmed|min:8',
                'password_confirmation' => 'required|same:password'
            ]);
        //dd($request->name);
        //dd($request);
        
            $user = new User;
            $user->Name = $request->name;
            //dd($request->ID);
            $user->Phone = $request->phone;
            
            $user->Address = $request->address;
            $user->Email = $request->email;
            $user->PassWord = Hash::make($request->password);
            //dd($category);
            $user->save();
            $user->roles()->attach(\App\Role::where('name', 'user')->first());
            return redirect()->route("admin.user.show")->with(['className'=>'success','notify'=>'Add User Success']);
            //return $this->show();
        
        
    }

    public function getedit($id)
    {

        $user_current_login = Auth::user();
        //dd(gettype((int)$id));
        $user = User::find($id);
        //dd($user->level);
        
            //dd(1);
            return view('Admin.User.Edit', ['user' => $user]);
      
        
        //dd($id);
        //$user = users::findOrFail($id);
        
        //dd($category);
        //$data = ProductCategory::all();
        
    }

    public function postedit(Request $request, $id)
    {
        //dd($id);
        $this->validate(
            $request,
            ["name"=>"required"],
            ["name.required"=>"please enter name"]
            
        );
        $user_current_login = Auth::user();
        $user = User::find($id);
        
            if($request->password == $request->password_confirmation)
            {
                //dd($user_current_login);
                $res = DB::update('update users set name = ?,email=?, phone = ?,address = ?,password=? where ID = ?', [$request->name ,$request->email, $request->phone,$request->address, Hash::make($request->password),$id]);

                //$category->save();
                if($res > 0)
                {
                    echo "update thanh cong";
                }
                else {
                    echo "update KO thanh cong";
                }
               
                return redirect()->route("admin.user.show")->with(['className'=>'success','notify'=>'edit Category Success']);
                }
        
    
        
        
    }
    public function getdelete($id)
    {

        //dd($id);
        $user_current_login = Auth::user()->id;
        $user = User::find($id);
            //$category = ProductCategory::find($id);
            //dd($content);
            $res = DB::delete('delete from users where ID = ?', [$id]);
            // $user->roles()->detach($id);
            // DB::table('role_user')->where('user_id', $id)->delete();
            DB::delete('delete from role_user where user_id = ?', [$id]);
            // $user->detachRoles($id);
            // $user->roles()->deattach(\App\Role::where('name', 'user')->first());
            return redirect()->route("admin.user.show")->with(['className'=>'success','notify'=>'delete user Success']);
    }
}
