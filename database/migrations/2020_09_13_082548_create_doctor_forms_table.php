<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDoctorFormsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('doctor_forms', function (Blueprint $table) {
            $table->id();
            $table->integer('patient_id');
            $table->string('blood_type')->nullable();
            $table->date('last_menstrual_date')->nullable();
            $table->string('nature_of_examination')->nullable();
            $table->string('medical_history')->nullable();
            $table->string('height')->nullable();
            $table->string('weight')->nullable();
            $table->string('bmi')->nullable();
            $table->string('body_built')->nullable();
            $table->string('blood_pressure')->nullable();
            $table->string('pulse_rate')->nullable();
            $table->string('respiration')->nullable();
            $table->string('temperature')->nullable();
            $table->boolean('left_eye_corrected')->nullable();
            $table->string('left_eye_fov')->nullable();
            $table->boolean('right_eye_corrected')->nullable();
            $table->string('right_eye_fov')->nullable();
            $table->string('ishihara')->nullable();
            $table->string('left_ear')->nullable();
            $table->string('right_ear')->nullable();
            $table->string('clarity_of_speech')->nullable();
            $table->string('body_system')->nullable();
            $table->string('dental')->nullable();
            $table->string('complete_blood_count')->nullable();
            $table->string('urinalysis')->nullable();
            $table->string('stool_exam')->nullable();
            $table->string('drug_test')->nullable();
            $table->string('pregnancy_test')->nullable();
            $table->string('hepatitis_test')->nullable();
            $table->string('blood_chem')->nullable();
            $table->string('chest_xray')->nullable();
            $table->string('ecg')->nullable();
            $table->string('other_examinations')->nullable();
            $table->string('impressions')->nullable();
            $table->integer('medical_evaluation')->nullable();
            $table->text('recommendations')->nullable();
            $table->boolean('certified')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('doctor_forms');
    }
}
