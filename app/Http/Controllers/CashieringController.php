<?php

namespace App\Http\Controllers;

use App\Patient;
use App\Exam;
use App\Package;
use App\Company;
use App\CashieringTransaction;
use Illuminate\Http\Request;

class CashieringController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $exams = Exam::select('exams.*', 'exam_categories.name as category')
            ->leftjoin('exam_categories', 'exam_categories.id', '=', 'exams.exam_category_id')
            ->orderBy('exams.name')->paginate(10);

        $packages = Package::select('packages.*')->orderBy('packages.name')->paginate(1);

        $patients = Patient::select('patients.id', 'patients.lastname', 'patients.firstname', 
            'patients.middlename', 'patients.gender')->orderBy('patients.lastname')
            ->paginate(3);

        $companies = Company::all();

        return view('layouts.cashiering', ['patient_id' => 0, 'patient_name' => '', 'type' => 0, 'patients' => $patients, 'exams' => $exams, 'packages' => $packages, 'companies' => $companies]);
    }

    public function getPatientList(Request $request) {
        $search = $request->query('search');

        $patients = Patient::select('patients.id', 'patients.lastname', 'patients.firstname', 
            'patients.middlename', 'patients.gender', 'companies.name')
            ->leftjoin('companies', 'companies.id', '=', 'patients.company_id');

        if ($search) {
            $patients = $patients->where('patients.lastname', 'LIKE', "%$search%")
                        ->orWhere('patients.firstname', 'LIKE', "%$search%")
                        ->orWhere('patients.middlename', 'LIKE', "%$search%")
                        ->orWhere('companies.name', 'LIKE', "%$search%");
        }

        $patients = $patients->orderBy('patients.lastname')->paginate(3);

        return view('ajax-forms.patient-list',  ['patients' => $patients]);
    }

    public function getCashieringExamLists(Request $request) {
        $search = $request->query('search');

        $exams = Exam::select('exams.*', 'exam_categories.name as category')
            ->leftjoin('exam_categories', 'exam_categories.id', '=', 'exams.exam_category_id');

        if ($search) {
            $exams = $exams->where('exams.name', 'LIKE', "%$search%");
        }

        $exams = $exams->orderBy('exams.name')->paginate(10);

        return view('ajax-forms.cashiering-exam-list',  ['exams' => $exams]);
    }

    public function getPackageInfo(Request $request) {
        $id = $request->query('id');

        $package_info = Package::select('packages.*')->where('packages.id', '=', $id)->get();

        $package = Package::select('exams.name as exam', 'exams.price as exam_price')
                    ->leftjoin('package_exams', 'package_exams.package_id', '=', 'packages.id')
                    ->leftjoin('exams', 'exams.id', '=', 'package_exams.exam_id')
                    ->where('packages.id', '=', $id)
                    ->orderBy('packages.name')
                    ->get();

        return view('ajax-forms.package-info',  ['package' => $package, 'package_info' => $package_info]);
    }

    public function getCashieringPackageLists(Request $request) {
        $search = $request->query('search');

        $packages = Package::select("packages.*");
        
        if ($search) {
            $packages = $packages->where('packages.name', 'LIKE', "%$search%");
        }

        $packages = $packages->orderBy('packages.name')->paginate(1);

        return view('ajax-forms.cashiering-package-list',  ['packages' => $packages]);
    }

    public function cashieringPatientSave(Request $request) {
        $patient = new Patient;
        $patient->lastname = $request->input('lastname');
        $patient->firstname = $request->input('firstname');
        $patient->middlename = $request->input('middlename');
        $patient->gender = $request->input('gender');
        $patient->birthdate = $request->input('birthdate');
        $patient->company_id = $request->input('company_id');

        if ($patient->save()) {
            $name = $patient->firstname . ' ' . $patient->middlename . ' ' . $patient->lastname;
            $exams = Exam::select('exams.*', 'exam_categories.name as category')
                ->leftjoin('exam_categories', 'exam_categories.id', '=', 'exams.exam_category_id')
                ->orderBy('exams.name')->paginate(10);

            $packages = Package::select('packages.*')->orderBy('packages.name')->paginate(1);

            $patients = Patient::select('patients.id', 'patients.lastname', 'patients.firstname', 
                'patients.middlename', 'patients.gender')->orderBy('patients.lastname')
                ->paginate(3);

            $companies = Company::all();

            return view('layouts.cashiering', ['patient_id' => $patient->id,'patient_name' => $name, 'type' => 2, 'patients' => $patients, 'exams' => $exams, 'packages' => $packages, 'companies' => $companies]);
            // return view('layouts.cashiering', ['patient' => $name, 'message' => 'success']);
            //return redirect()->intended("/cashiering");
        } else {
            // return view('layouts.patient-registration', ['message' => 'error']);
            return redirect()->intended("/cashiering");
        }
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
        $ct = new CashieringTransaction;

        $ct->patient_id = $request->input('patient_id');
        $ct->number = $request->input('number');
        $ct->code = $request->input('code');

        //
        $exams = $request->input('exams');
        $packages = $request->input('packages');

        $exams_str = '';

        if ($exams) {
            foreach($exams as $exam) {
                $exams_str .= substr($exam, 1, strlen($exam) - 1) . ',';
            }
    
            $exams_str = substr($exams_str, 0, strlen($exams_str) - 1);
    
        }
        
        $packages_str = '';
        
        if ($packages) {
            foreach($packages as $package) {
                $packages_str .= substr($package, 1, strlen($package) - 1) . ',';
            }
    
            $packages_str = substr($packages_str, 0, strlen($packages_str) - 1);
        }
        
        // 

        $ct->exams = $exams_str;
        $ct->packages = $packages_str;

        $ct->remarks = $request->input('remarks');
        $ct->discount = $request->input('discount');
        $ct->discount_type = $request->input('discount_type');
        $ct->payment_method = $request->input('payment_method');
        $ct->sales_invoice = $request->input('sales_invoice');
        $ct->total = $request->input('total');
        $ct->amount_due = $request->input('amount_due');
        $ct->tendered = $request->input('tendered');
        $ct->change_due = $request->input('change_due');

        if ($ct->save()) {
            // return view('layouts.user-registration', ['message' => 'success']);
            return redirect()->intended("/cashiering");
            
        } else {
            // return view('layouts.user-registration', ['message' => 'error']);
            return redirect()->intended("/cashiering");
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
