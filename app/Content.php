<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Content extends Model
{
    protected $table ="Content";
    public $timestamps = false;
	public function category()
    {
		return $this->belongsTo('App\Category', 'categoryID', 'ID');

	}
}
