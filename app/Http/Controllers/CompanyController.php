<?php

namespace App\Http\Controllers;

use App\Company;
use App\Package;
use App\CompanyPackage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $companies = Company::select("companies.*")->paginate(10);
        return view('layouts.company-list', ['data' => $companies]);
    }

    public function registration($id = 0) {
        $packages = Package::select('packages.*')
            ->orderBy('packages.name')->paginate(15);

        $company_packages = CompanyPackage::select('packages.*')
            ->leftjoin('packages', 'packages.id', '=', 'company_packages.package_id')
            ->where('company_packages.company_id', '=', $id)
            ->orderBy('packages.name')
            ->get();

        $company = Company::select('companies.*')->where('companies.id', '=', $id)->get();
        
        return view('layouts.company-registration',  ['company' => $company, 'data' => $packages, 'packages' => $company_packages]);
    }

    public function getPackageList(Request $request) {
        $packages = Package::select('packages.*')
            ->orderBy('packages.name')->paginate(15);

            return view('ajax-forms.package-list',  ['data' => $packages]);
    }

    public function getCompanyList(Request $request) {
        $search = $request->query('search');

        $companies = Company::select("companies.*");

        if ($search) {
            $companies = $companies->where('companies.name', 'LIKE', "%$search%")
                        ->orWhere('companies.address', 'LIKE', "%$search%")
                        ->orWhere('companies.contact_person', 'LIKE', "%$search%");
        }

        $companies = $companies->orderBy('companies.name')->paginate(10);

        return view('ajax-forms.company-main-list',  ['data' => $companies]);
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
        $company = $request->isMethod('put') ? 
            Company::findOrFail($request->id) : new Company;

        $id = $request->id ? $request->id : 0;

        $company->name = $request->input('name');
        $company->address = $request->input('address');
        $company->contact_person = $request->input('contact_person');
        $company->tin = $request->input('tin');
        $company->fax = $request->input('fax');
        $company->contact = $request->input('contact');
        $company->status = $request->input('status');

        $packages = $request->input('packages');

        if ($company->save()) {
            $company_packages = [];

            foreach ($packages as $package) {
                $company_packages[] = [
                    'user_id' => Auth::id(),
                    'company_id' => $company->id,
                    'package_id' => $package
                ];
            }
            
            if ($request->isMethod('put')) {
                CompanyPackage::where('company_id', $company->id)->delete();
            }

            CompanyPackage::insert($company_packages);

            return redirect()->intended("/company/$id/registration");
        } else {
            // return response(['message' => $company]);
            return redirect()->intended("/company/$id/registration");
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
