<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{

    protected $table ="Category";
    public $timestamps = false;
	public function content(){
		return $this->hasMany('App\Content', 'categoryID', 'ID');
	}
}
