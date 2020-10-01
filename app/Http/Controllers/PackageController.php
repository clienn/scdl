<?php

namespace App\Http\Controllers;

use App\Package;
use App\PackageExam;
use App\Exam;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PackageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $packages = Package::select("packages.*")->paginate(10);
        return view('layouts.package-list', ['data' => $packages]);
    }

    public function registration($id = 0) {
        $exams = Exam::select('exams.*', 'exam_categories.name as category')
            ->leftjoin('exam_categories', 'exam_categories.id', '=', 'exams.exam_category_id')
            ->orderBy('exams.name')->paginate(15);

        $package_exams = PackageExam::select('exams.*', 'exam_categories.name as category')
            ->leftjoin('exams', 'exams.id', '=', 'package_exams.exam_id')
            ->leftjoin('exam_categories', 'exam_categories.id', '=', 'exams.exam_category_id')
            ->where('package_exams.package_id', '=', $id)
            ->orderBy('exams.name')->get();

        $package = Package::select('packages.*')->where('packages.id', '=', $id)->get();

        return view('layouts.package-registration',  ['package' => $package, 'data' => $exams, 'package_exams' => $package_exams]);
    }

    public function getExamList(Request $request) {
        $exams = Exam::select('exams.*', 'exam_categories.name as category')
            ->leftjoin('exam_categories', 'exam_categories.id', '=', 'exams.exam_category_id')
            ->orderBy('exams.name')->paginate(15);

            return view('ajax-forms.exam-list',  ['data' => $exams]);
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
        $package = $request->isMethod('put') ? 
            Package::findOrFail($request->id) : new Package;

        $id = $request->id ? $request->id : 0;

        $package->name = $request->input('name');
        $package->price = $request->input('price');
        $package->discount = $request->input('discount');
        $package->discount_type = $request->input('discount_type');

        $exams = $request->input('exams');

        if ($package->save()) {
            $package_exams = [];

            foreach ($exams as $exam) {
                $package_exams[] = [
                    'user_id' => Auth::id(),
                    'package_id' => $package->id,
                    'exam_id' => $exam
                ];
            }
            
            if ($request->isMethod('put')) {
                PackageExam::where('package_id', $package->id)->delete();
            }

            PackageExam::insert($package_exams);

            return redirect()->intended("/package/$id/registration");
        } else {
            // return response(['message' => $company]);
            return redirect()->intended("/package/$id/registration");
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
