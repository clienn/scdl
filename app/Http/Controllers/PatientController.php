<?php

namespace App\Http\Controllers;

use App\Patient;
use App\Company;
use Illuminate\Http\Request;

class PatientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $patients = Patient::select("patients.*")->paginate(10);
        // echo "<pre>";
        // print_r($patients);
        // echo "</pre>";
        return view('layouts.patient-list', ['data' => $patients]);
    }

    public function registration($id = 0) {
        $patient = Patient::select('patients.*')->where('patients.id', '=', $id)->get();
        return view('layouts.patient-registration',  ['data' => Company::all(), 'patient' => $patient]);
    }

    public function getPatientList(Request $request) {
        $search = $request->query('search');

        $patients = Patient::select('patients.id', 'patients.lastname', 'patients.firstname', 
            'patients.middlename', 'patients.gender', 'patients.birthdate', 'companies.name')
            ->leftjoin('companies', 'companies.id', '=', 'patients.company_id');

        if ($search) {
            $patients = $patients->where('patients.lastname', 'LIKE', "%$search%")
                        ->orWhere('patients.firstname', 'LIKE', "%$search%")
                        ->orWhere('patients.middlename', 'LIKE', "%$search%")
                        ->orWhere('companies.name', 'LIKE', "%$search%");
        }

        $patients = $patients->orderBy('patients.lastname')->paginate(10);

        return view('ajax-forms.patient-main-list',  ['data' => $patients]);
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
        $patient = $request->isMethod('put') ? 
            Patient::findOrFail($request->id) : new Patient;

        $id = $request->id ? $request->id : 0;

        $patient->lastname = $request->input('lastname');
        $patient->firstname = $request->input('firstname');
        
        $patient->middlename = $request->input('middlename');
        $patient->company_id = 1;//$request->input('company_id');
        $patient->birthdate = $request->input('birthdate');
        $patient->gender = $request->input('gender');
        $patient->address1 = $request->input('address1');
        $patient->address2 = $request->input('address2');
        $patient->city = $request->input('city');
        $patient->zipcode = $request->input('zipcode');
        $patient->marital_status = $request->input('marital_status');
        $patient->ethnicity = $request->input('ethnicity');
        $patient->type = $request->input('type');
        $patient->sticks_per_day = $request->input('sticks_per_day');
        $patient->alcohol_rate = $request->input('alcohol_rate');
        $patient->email = $request->input('email');
        $patient->phone = $request->input('phone');
        $patient->mobile = $request->input('mobile');
        $patient->fax = $request->input('fax');
        $patient->sss = $request->input('sss');
        $patient->philhealth = $request->input('philhealth');
        $patient->hmo = $request->input('hmo');
        $patient->hmo_no = $request->input('hmo_no');
        $patient->membership_date = $request->input('membership_date');
        $patient->expiration_date = $request->input('expiration_date');

        $patient->status = $request->input('status');

        if ($patient->save()) {
            // return view('layouts.patient-registration', ['data' => Company::all(), 'message' => 'success']);
            return redirect()->intended("/patient/$id/registration");
        } else {
            // return view('layouts.patient-registration', ['message' => 'error']);
            return redirect()->intended("/patient/$id/registration");
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
