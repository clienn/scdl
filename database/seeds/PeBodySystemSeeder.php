<?php

use Illuminate\Database\Seeder;

class PEBodySystemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $arr = ['SKIN',
        'HEAD, NECK, SCALP',
        'EYES EXTERNAL',
        'PUPILS, OPHTHALMOSCOPIC',
        'EARS',
        'NOSE, SINUSES',
        'MOUTH, THROAT',
        'NECK, THYROID',
        'CHEST-BREAST-AXILLA',
        'HEART',
        'LUNGS',
        'ABDOMEN',
        'SPINE',
        'BACK',
        'ANUS, RECTUM',
        'G-U SYSTEM',
        'INGUINALS, GENITALS',
        'REFLEXES',
        'EXTREMITIES',
        'LYMPH  NODES'];

        $len = count($arr);

        for ($i = 0; $i < $len; ++$i) { 
	    	DB::table('pe_body_systems')->insert([
	            'name' => $arr[$i]
	        ]);
    	}
    }
}
