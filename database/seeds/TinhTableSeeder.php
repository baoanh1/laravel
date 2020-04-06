<?php

use Illuminate\Database\Seeder;
use App\Province;
class TinhTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tinh = new Province;
	    $tinh->name = 'Hà Nội';
	    $tinh->code = '0001';
	    $tinh->save();
	    $tinh = new Province;
	    $tinh->name = 'Hồ Chí Minh';
	    $tinh->code = '0001';
	    $tinh->save();
    }
}
