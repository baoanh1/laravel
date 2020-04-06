<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
	public $timestamps = true;
    protected $table ="product";
    protected $fillable = [
        'Name', 'MetaTitle', 'Description', 'Image', 'MoreImages', 'Price', 'categoryID', 'Detail', 'district_id', 'state','user_id','created_date','updated_at',
    ];
    
    public function procate()
    {
        return $this->belongsTo('App\ProductCategory', 'categoryID', 'ID');

    }
    public function moreImages()
    {
        return $this->hasMany('App\MoreImagesProduct', 'product_id', 'ID');

    }
    public function districts()
    {
        return $this->belongsTo('App\District', 'district_id', 'id');

    }
    public function users()
    {
        return $this->belongsTo('App\User','user_id','ID');
    }
}
