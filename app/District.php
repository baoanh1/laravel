<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class District extends Model
{
	protected $fillable = [
        'name', 'code',
    ];
    protected $table = "districts";
    public $timestamps = false;
    public function provinces()
    {
    	return $this->belongsTo('App\Province','province_id', 'id');
    }
}
