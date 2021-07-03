<?php

namespace App\Http\Controllers;

use App\Exam;
use App\ExamCategory;
use App\ExamType;
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

        $exam_type_ids = [];

        foreach ($exam as $val) {
            if ($val->exam_type_ids) {
                $exam_type_ids = explode(",", $val->exam_type_ids);
            }
            break;
        }

        $exam_types = ExamType::select('exam_types.*')
            ->whereIn('exam_types.id', $exam_type_ids)
            ->orderBy('exam_types.description')->get();

        $data = ExamType::select('exam_types.*')
            ->orderBy('exam_types.description')->paginate(15);

        return view('layouts.exam-registration',  [
            'exam_types' => $exam_types, 
            'data' => $data, 
            'exam' => $exam, 
            'categories' => $categories
        ]);
    }

    public function getExamTypeList(Request $request) {
        $exam_types = ExamType::select('exam_types.*')
            ->orderBy('exam_types.description')->paginate(15);

            return view('ajax-forms.exam-type-list',  ['data' => $exam_types]);
    }

    public function searchExamType(Request $request) {
        $search = $request->query('search');

        $exam_types = ExamType::select("exam_types.*");
        
        if ($search) {
            $exam_types = $exam_types->where('exam_types.description', 'LIKE', "%$search%");
        }

        $exam_types = $exam_types->orderBy('exam_types.description')->paginate(15);

        return view('ajax-forms.exam-type-list',  ['data' => $exam_types]);
    }

    public function examType()
    {
        $exams = ExamType::select('exam_types.*')
            ->orderBy('exam_types.description')
            ->paginate(10);

        return view('layouts.exam-type', ['data' => $exams]);
    }

    public function getExamTypes(Request $request) {
        $search = $request->query('search');

        $exams = ExamType::select('exam_types.*');

        if ($search) {
            $exams = $exams->where('exam_types.description', 'LIKE', "%$search%");
        }

        $exams = $exams->orderBy('exam_types.description')->paginate(10);

        return view('ajax-forms.exam-types',  ['data' => $exams]);
    }

    public function examTypeRegistration($id = 0) {
        $exam = ExamType::select('exam_types.*')->where('exam_types.id', '=', $id)->get();

        return view('layouts.exam-type-registration',  ['exam' => $exam]);
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

        $exams = $request->input('exams');
        $tmp = [];

        foreach ($exams as $val) {
            $tmp[] = $val;
        }

        $exam_type_ids = implode(",", $tmp);

        $exam->exam_type_ids = $exam_type_ids;

        if ($exam->save()) {
            // return response(['message' => 'success']);
            return redirect()->intended("/exam/$id/registration");
        } else {
            // return response(['message' => $company]);
            return redirect()->intended("/exam/$id/registration");
        }
    }

    public function storeExamType(Request $request)
    {
        $exam = $request->isMethod('put') ? 
            ExamType::findOrFail($request->id) : new ExamType;

        $id = $request->id ? $request->id : 0;

        $exam->description = $request->input('description');
        $exam->normal_values = $request->input('normal_values');
        $exam->type = $request->input('type');
        $exam->choices = $request->input('choices');

        if ($exam->save()) {
            // return response(['message' => 'success']);
            return redirect()->intended("/exam_type/$id/registration");
        } else {
            // return response(['message' => $company]);
            return redirect()->intended("/exam_type/$id/registration");
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

    public function delete($id)
    {  
        $exam_type = ExamType::find($id);

        if ($exam_type) {
            $exam_type->delete();
            return redirect()->intended("/exam_type/list");
        } else {
            return redirect()->intended("/exam_type/list");
        }
    }
}
