<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductCategory extends Model
{
    protected $table ="ProductCategory";
    public $timestamps = false;
    public function product(){
        return $this->hasMany('App\Product', 'categoryID', 'ID');
    }
    public function parent()
	{
	    return $this->belongsTo('App\ProductCategory','ParentID','ID')->where('ParentID',0)->with('parent');
	}

	public function children()
	{
	    return $this->hasMany('App\ProductCategory','ParentID','ID')->with('children');
	}
	public function recursiveChildren() {
    	return $this->children()->with('recursiveChildren');
    	//It seems this is recursive
	}
}
