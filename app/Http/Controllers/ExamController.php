<?php

namespace App\Http\Controllers;

use App\Exam;
use App\ExamCategory;
use Illuminate\Http\Request;

class ExamController extends Controller
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
            ->paginate(10);
        return view('layouts.exam-list', ['data' => $exams]);
    }

    public function registration($id = 0) {
        $exam = Exam::select('exams.*')->where('exams.id', '=', $id)->get();
        $categories = ExamCategory::all();
        return view('layouts.exam-registration',  ['exam' => $exam, 'categories' => $categories]);
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
        $exam = $request->isMethod('put') ? 
            Exam::findOrFail($request->id) : new Exam;

        $id = $request->id ? $request->id : 0;

        $exam->name = $request->input('name');
        $exam->exam_category_id = $request->input('exam_category_id');
        $exam->price = $request->input('price');

        if ($exam->save()) {
            // return response(['message' => 'success']);
            return redirect()->intended("/exam/$id/registration");
        } else {
            // return response(['message' => $company]);
            return redirect()->intended("/exam/$id/registration");
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
