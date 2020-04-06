<?php
namespace Unisharp\Laravelfilemanager\Handlers;
class ConfigHandler extends UniSharp\LaravelFilemanager\Handlers
{
	public function __construct()
    {
        dd(1111);
    }
    public function userField()
    {
    	dd(1111);
        return auth()->user()->name;
    }

    public function baseDirectory(){
    	dd("base directory");
        if(auth()->user()->user_type !== "S"){
            return 'storage/'.auth()->user()->name;
        }
        else{
            return 'storage/';
        }
    }
}