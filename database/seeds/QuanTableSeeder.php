<?php

use Illuminate\Database\Seeder;
use App\District;
class QuanTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $district = new District;
	    $district->name = 'Cầu Giấy';
	    $district->code = '0001';
	    $district->province_id = 1;
	    $district->save();
	    $district = new District;
	    $district->name = 'Từ Liêm';
	    $district->code = '0001';
	    $district->province_id = 1;
	    $district->save();
	    $district = new District;
	    $district->name = 'Quận 1';
	    $district->code = '0001';
	    $district->province_id = 2;
	    $district->save();
	    $district = new District;
	    $district->name = 'Quận 2';
	    $district->code = '0001';
	    $district->province_id = 2;
	    $district->save();
    }
}
