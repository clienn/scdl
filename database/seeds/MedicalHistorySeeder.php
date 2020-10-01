<?php

use Illuminate\Database\Seeder;

class MedicalHistorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        			
        $arr = ['NOSE/ THROAT TROUBLE',
        'EAR TROUBLE',
        'TRACHOMA/EYE TROUBLE',
        'ASTHMA',
        'TUBERCULOSIS',
        'OTHER LUNG DISEASE',
        'CHRONIC COUGH',
        'HIGH BLOOD PRESSURE',
        'HEART TROUBLE',
        'RHEUMATIC FEVER',
        'DIABETES MELLITUS',
        'ENDOCRINE DISORDER',
        'CANCER/TUMOR',
        'MENTAL DISORDER',
        'HEAD/NECK INJURY',
        'HERNIA (RAPTURED)',
        'RHEUMATISM',
        'TYPHOID/ PARATYPHOID-FEVER',
        'STOMACH PAIN/ULCER',
        'OTHER ABDOMINAL TROUBLE',
        'GENETIC/FAMILIAL DISORDER',
        'MALARIA',
        'SURGERY (MINOR/MAJOR)',
        'KIDNEY OR BLADDER TROUBLE',
        'FAINTING SPELLS',
        'FREQUENT HEADACHES',
        'SEXUALLY TRANSMITTED DISEASE',
        'LIVER DISEASE',
        'ALLERGIES (specify)',
        'NERVOUSNESS/DEPRESSION/ANXIETY'];

        $len = count($arr);

        for ($i = 0; $i < $len; ++$i) { 
	    	DB::table('medical_histories')->insert([
	            'name' => $arr[$i]
	        ]);
    	}
    }
}
