<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table = "order";
    public $timestamps = false;

    public function orderdetal()
    {
		return $this->hasMany('App\OrderDetail', 'OrderID', 'ID');
	}
}
