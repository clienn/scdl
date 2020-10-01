<?php

use Illuminate\Database\Seeder;

class ExamSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 2; $i <= 30; ++$i) { 
	    	DB::table('exams')->insert([
	            'name' => "Exam #$i",
                'exam_category_id' => rand(1, 30),
                'price' => rand(100, 5000)
	        ]);
    	}
    }
}
