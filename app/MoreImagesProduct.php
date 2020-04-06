<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MoreImagesProduct extends Model
{
	public $timestamps = false;
	protected $fillable = [
        'image', 'product_id',
    ];
    protected $table ="more_images_product";
    public function ofproduct()
    {
        return $this->belongsTo('App\Product', 'product_id', 'id');

    }
}
