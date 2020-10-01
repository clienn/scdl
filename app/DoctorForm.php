<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DoctorForm extends Model
{
    protected $fillable = ['patient_id',
        'blood_type',
        'last_menstrual_date',
        'nature_of_examination',
        'medical_history',
        'height',
        'weight',
        'bmi',
        'body_built',
        'blood_pressure',
        'pulse_rate',
        'respiration',
        'temperature',
        'left_eye_corrected',
        'left_eye_fov',
        'right_eye_corrected',
        'right_eye_fov',
        'ishihara',
        'left_ear',
        'right_ear',
        'clarity_of_speech',
        'body_system',
        'dental',
        'complete_blood_count',
        'urinalysis',
        'stool_exam',
        'drug_test',
        'pregnancy_test',
        'hepatitis_test',
        'blood_chem',
        'chest_xray',
        'ecg',
        'other_examinations',
        'impressions',
        'medical_evaluation',
        'recommendations',
        'certified',
        'created_at',
        'update_at'];
}
