<?php

use Illuminate\Database\Seeder;

class PEDentalSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $arr = ['CARRIES',
        'JACKET',
        'DENTURE',
        'FILLINGS',
        'MISSING TEETH'];

        $len = count($arr);

        for ($i = 0; $i < $len; ++$i) { 
	    	DB::table('pe_dentals')->insert([
	            'name' => $arr[$i]
	        ]);
    	}
    }
}
