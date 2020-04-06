<?php

use Illuminate\Database\Seeder;

class MoreImagesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	$moreimages = new MoreImagesProduct;
	    
	    $moreimages->save();
    }
}
