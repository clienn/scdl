<?php

use Illuminate\Database\Seeder;

class ExamCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 1; $i <= 30; ++$i) { 
	    	DB::table('exam_categories')->insert([
	            'name' => "Exam Category #$i",
	            'description' => Str::random(30)
	        ]);
    	}
    }
}
