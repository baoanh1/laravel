<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Province extends Model
{
	protected $fillable = [
        'name', 'code',
    ];
    protected $table = "provinces";
    public $timestamps = false;
    public function districts()
    {
    	return $this->hasMany('App\District','province_id', 'id');
    }
}
