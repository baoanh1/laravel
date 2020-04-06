<?php

namespace App\Handlers;
use Auth;
class LfmConfigHandler extends \UniSharp\LaravelFilemanager\Handlers\ConfigHandler
{
    public function userField()
    {
        if (Auth::user() &&  Auth::user()->hasRole('admin')) {
        	//dd("admin");
               return 'admin_folder/'. auth()->user()->id;
         }
         elseif(Auth::user() && Auth::user()->hasRole('user'))
         {
         	//dd("user");
            return 'user_folder/' . auth()->user()->id; 
         }
         else{
            
         }
    }
    //  public function baseDirectory(){
    // 	dd("base directory");
 
    //     return 'storage/'.auth::user()->roles->first()->name;
    // }
}
