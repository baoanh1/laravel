<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Promo extends Model
{
   protected $table = "promo";
   public $timestamps = false;
   public function  getproduct()
   {
        return $this->belongsTo('App\Product', 'productID', 'id');
   }
}
