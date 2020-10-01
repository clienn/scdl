<?php

namespace App\Http\Controllers;

use App\MedicalHistory;
use App\PeBodySystem;
use App\PeDental;
use App\DoctorForm;
use App\Patient;
use Illuminate\Http\Request;

class DoctorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id, $fid)
    {
        $mh = MedicalHistory::All();
        $bs = PeBodySystem::All();
        $dental = PeDental::All();

        $patient = Patient::select('patients.*')->where('patients.id', '=', $id)->get();
        $patient_forms = DoctorForm::select('doctor_forms.id', 'doctor_forms.created_at')
            ->where('doctor_forms.patient_id', '=', $id)->orderBy('doctor_forms.created_at')->get();

        $patients = Patient::select('patients.id', 'patients.lastname', 'patients.firstname', 
            'patients.middlename', 'patients.gender')->orderBy('patients.lastname')
            ->paginate(5);

        $doctor_form = DoctorForm::select('doctor_forms.*')->where('doctor_forms.id', '=', $fid)->get();

        return view('layouts.doctors-form', ['data' => '', 'mh' => $mh, 'bs' => $bs, 
            'dental' => $dental, 'patient' => $patient, 'patients' => $patients, 
            'doctor_form' => $doctor_form, 'patient_forms' => $patient_forms]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $id = $request->input('id');
        $fid = $request->input('fid');

        $doctor_form = $request->isMethod('put') ? 
            DoctorForm::findOrFail($fid) : new DoctorForm;

        if ($request->isMethod('post'))
            $doctor_form->patient_id = $id;

        $doctor_form->blood_type = $request->input('blood_type');
        $doctor_form->last_menstrual_date = $request->input('last_menstrual_date');
        $doctor_form->nature_of_examination = $request->input('nature_of_examination');
        $doctor_form->medical_history = $request->input('medical_history');
        $doctor_form->height = $request->input('height');
        $doctor_form->weight = $request->input('weight');
        $doctor_form->bmi = $request->input('bmi');
        $doctor_form->body_built = $request->input('body_built');
        $doctor_form->blood_pressure = $request->input('blood_pressure');
        $doctor_form->pulse_rate = $request->input('pulse_rate');
        $doctor_form->respiration = $request->input('respiration');
        $doctor_form->temperature = $request->input('temperature');
        $doctor_form->left_eye_corrected = $request->input('left_eye_corrected');
        $doctor_form->left_eye_fov = $request->input('left_eye_fov');
        $doctor_form->right_eye_corrected = $request->input('right_eye_corrected');
        $doctor_form->right_eye_fov = $request->input('right_eye_fov');
        $doctor_form->ishihara = $request->input('ishihara');
        $doctor_form->left_ear = $request->input('left_ear');
        $doctor_form->right_ear = $request->input('right_ear');
        $doctor_form->clarity_of_speech = $request->input('clarity_of_speech');
        $doctor_form->body_system = $request->input('body_system');
        $doctor_form->dental = $request->input('dental');
        $doctor_form->complete_blood_count = $request->input('complete_blood_count');
        $doctor_form->urinalysis = $request->input('urinalysis');
        $doctor_form->stool_exam = $request->input('stool_exam');
        $doctor_form->drug_test = $request->input('drug_test');
        $doctor_form->pregnancy_test = $request->input('pregnancy_test');
        $doctor_form->hepatitis_test = $request->input('hepatitis_test');
        $doctor_form->blood_chem = $request->input('blood_chem');
        $doctor_form->chest_xray = $request->input('chest_xray');
        $doctor_form->ecg = $request->input('ecg');
        $doctor_form->other_examinations = $request->input('other_examinations');
        $doctor_form->impressions = $request->input('impressions');
        $doctor_form->medical_evaluation = $request->input('medical_evaluation');
        $doctor_form->recommendations = $request->input('recommendations');
        
        $certified = $request->input('certified');
        $certified = $certified ? true : false;

        $doctor_form->certified = $certified;

        if ($doctor_form->save()) {
            // return view('layouts.patient-registration', ['data' => Company::all(), 'message' => 'success']);
            return redirect()->intended("/doctor/form/$id/$fid");
        } else {
            // return view('layouts.patient-registration', ['message' => 'error']);
            return redirect()->intended("/doctor/form/$id/$fid");
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
