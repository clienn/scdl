<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\CashieringTransaction;
use App\Patient;
use App\Exam;
use App\ExamCategory;
use App\ExamType;
use App\Package;
use App\PackageExam;
use App\Result;

class ResultController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = CashieringTransaction::select('cashiering_transactions.*', 'results.exam_result', 
            'patients.lastname', 'patients.firstname', 'patients.middlename')
            ->leftjoin('patients', 'patients.id', '=', 'cashiering_transactions.patient_id')
            ->leftjoin('results', 'results.cashiering_transaction_id', '=', 'cashiering_transactions.id')
            ->where('cashiering_transactions.status', '<', 2)
            // ->whereDate('cashiering_transactions.updated_at', '=', date('Y-m-d'))
            ->groupBy('cashiering_transactions.patient_id')
            ->orderBy('cashiering_transactions.id', 'desc')
            ->get();

        $exams = Exam::select('exams.id', 'exams.name')->get();
        $packages = Package::select('packages.id', 'packages.name')->get();

        $completed = CashieringTransaction::select('cashiering_transactions.*', 'results.exam_result', 
            'patients.lastname', 'patients.firstname', 'patients.middlename')
            ->leftjoin('patients', 'patients.id', '=', 'cashiering_transactions.patient_id')
            ->leftjoin('results', 'results.cashiering_transaction_id', '=', 'cashiering_transactions.id')
            ->where('cashiering_transactions.status', '=', 2)
            ->whereDate('cashiering_transactions.updated_at', '=', date('Y-m-d'))
            ->groupBy('cashiering_transactions.patient_id')
            ->orderBy('cashiering_transactions.id', 'desc')
            ->get();

        $archive = CashieringTransaction::select('cashiering_transactions.*', 'results.exam_result', 
            'patients.lastname', 'patients.firstname', 'patients.middlename')
            ->leftjoin('patients', 'patients.id', '=', 'cashiering_transactions.patient_id')
            ->leftjoin('results', 'results.cashiering_transaction_id', '=', 'cashiering_transactions.id')
            // ->where('cashiering_transactions.status', '=', 2)
            ->whereDate('cashiering_transactions.updated_at', '<', date('Y-m-d'))
            ->groupBy('cashiering_transactions.patient_id')
            ->orderBy('cashiering_transactions.id', 'desc')
            ->get();
        
        return view('layouts.results', ['data' => $data, 'completed_list' => $completed, 'archive' => $archive,
            'exams' => $exams, 'packages' => $packages]);
    }

    public function getPatientResults($id) {
        $data = CashieringTransaction::select('cashiering_transactions.*', 'results.exam_result', 
            'patients.lastname', 'patients.firstname', 'patients.middlename')
            ->leftjoin('patients', 'patients.id', '=', 'cashiering_transactions.patient_id')
            ->leftjoin('results', 'results.cashiering_transaction_id', '=', 'cashiering_transactions.id')
            ->where('patients.id', '=', $id)
            // ->whereDate('cashiering_transactions.updated_at', '=', date('Y-m-d'))
            // ->groupBy('cashiering_transactions.patient_id')
            ->orderBy('cashiering_transactions.id', 'desc')
            ->get();

        $exams = Exam::select('exams.id', 'exams.name')->get();
        $packages = Package::select('packages.id', 'packages.name')->get();
        
        return view('layouts.results-patient', ['data' => $data, 'exams' => $exams, 'packages' => $packages]);
    }

    public function getForm(Request $request) {
        $id = $request->query('id');
        $key = $request->query('key');

        if ($key == 'e') {
            $exam_types = $this->getExamTypes($id);

            if (count($exam_types) > 0) {
                return response(['data' => json_encode($exam_types), 'success' => true]);
            }
        } else if ($key == 'p') {
            $package_exams = PackageExam::select('package_exams.exam_id', 'packages.name', 'exams.name as exam_name')
                ->leftjoin('packages', 'packages.id', '=', 'package_exams.package_id')
                ->leftjoin('exams', 'exams.id', '=', 'package_exams.exam_id')
                ->where('package_exams.package_id', $id)->get();

            $data = [];

            foreach ($package_exams as $package) {
                $data[$package->exam_name] = [$this->getExamTypes($package->exam_id), $package->exam_id];
            }

            return response(['data' => json_encode($data), 'success' => true]);
        }

        return response(['success' => false]);
    }

    private function getExamTypes($id) {
        $q = Exam::select('exams.exam_type_ids')
            // ->leftjoin('exam_categories', 'exam_categories.id', '=', 'exams.exam_category_id')
            ->where('exams.id', $id)->first();

        if ($q) {
            $ids = explode(",", $q->exam_type_ids);

            $exam_types = ExamType::select('exam_types.*')
                ->whereIn('exam_types.id', $ids)
                ->get();

            return $exam_types;
        }

        return [];
    }

    private function isTestComplete($id, $results) { // cashiering id
        $flag = false;

        $q = CashieringTransaction::select('cashiering_transactions.id', 
            'cashiering_transactions.exams', 'cashiering_transactions.packages')
            ->where('cashiering_transactions.id', $id)->first();

        if ($q) {
            $exams = $q->exams ? explode(',', $q->exams) : [];
            $packages = $q->packages ? explode(',', $q->packages) : [];

            if (count($exams) > 0) {
                $flag = $this->validateTestResults($exams, $results, 'e');
            }
            
            if ($flag && count($packages) > 0) {
                foreach($packages as $p) {
                    $pq = Package::select('package_exams.exam_id')
                        ->leftjoin('package_exams', 'package_exams.package_id', '=', 'packages.id')
                        ->where('packages.id', $p)
                        ->get();
                        
                    $exam_ids = [];
                    foreach($pq as $val) {
                        $exam_ids[] = $val->exam_id;
                    }

                    $flag = $this->validateTestResults($exam_ids, $results['p' . $p], '');
                }
            }
        }

        return $flag;
    }

    public function test() {
        // $pq = Package::select('package_exams.exam_id')
        //     ->leftjoin('package_exams', 'package_exams.package_id', '=', 'packages.id')
        //     ->where('packages.id', 1)
        //     ->get();

        // var_dump($pq);
        // $results = json_decode('{"e1":{"1":"","2":"2","3":"1"},"p1":{"10":{"85":"YELLOWISH BROWN","86":"1","87":"222","88":"3","89":"3","90":"3","91":"3","92":"3","93":"3","94":"3","95":"3","96":"3","97":"3","98":"3","99":"3","100":"3","101":"3","102":"4"},"11":{"103":"123","104":"123","105":"123","106":"1","107":"2","108":"3","109":"5","110":"4","111":"2"},"12":{"112":"Yellow","113":"2","114":"2","115":"2","116":"2","117":"33333","118":"3","119":"3","120":"3","121":"3","122":"3"}}}', true);
        // var_dump($results);

        // $r = Result::select('results.*')->where('results.cashiering_transaction_id', 10)->first();

        // $flag = false;

        // if ($r) {
        //     $exam_type = 'p1';
        //     // $results = json_decode('{"e1":{"1":"","2":"2","3":"1"}}', true);
        //     $results = json_decode('{"p1":{"10":{"85":"YELLOWISH BROWN","86":"","87":"222","88":"3","89":"3","90":"3","91":"3","92":"3","93":"3","94":"3","95":"3","96":"3","97":"3","98":"3","99":"3","100":"3","101":"3","102":"4"},"11":{"103":"123","104":"123","105":"123","106":"1","107":"2","108":"3","109":"5","110":"4","111":"2"},"12":{"112":"Yellow","113":"2","114":"2","115":"2","116":"2","117":"33333","118":"3","119":"3","120":"3","121":"3","122":"3"}}}', true);
        //     $exam_result = json_decode($r->exam_result, true);
        //     $exam_result[$exam_type] = $results[$exam_type];

        //     // $r->exam_result = json_encode($exam_result);
        //     var_dump($exam_result);

        //     $flag = $this->isTestComplete($r->cashiering_transaction_id, $exam_result);
        // }
        // // $r = $this->isTestComplete(10, $results);
        // var_dump($flag);

        $ct = CashieringTransaction::select('cashiering_transactions.*')
            ->where('cashiering_transactions.id', 10)->first();

        if ($ct) {
            $ct->status = 1;
            $ct->save();
        }
    }

    private function validateTestResults($exams, $results, $prefix) {
        
        if (count($results) > 0) {
            $q = Exam::select('exams.id', 'exams.exam_type_ids')
                ->leftjoin('exam_categories', 'exam_categories.id', '=', 'exams.exam_category_id')
                ->whereIn('exams.id', $exams)
                ->get();

            foreach ($q as $item) {
                $exam_types = explode(',', $item->exam_type_ids);

                foreach($exam_types as $type) {
                    // echo $prefix . $item->id . '<br />';
                    if ($results[$prefix . $item->id][$type] == "") {
                        return false;
                    }
                }
            }

            return true;
        }

        return false;
    }

    public function list()
    {
        return view('layouts.result-list', []);
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
        $results = $request->input('results');
        $exam_type = $request->input('exam_type');

        $r = Result::select('results.*')->where('results.cashiering_transaction_id', $id)->first();

        $flag = false;

        if ($r) {
            $results = json_decode($results, true);
            $exam_result = json_decode($r->exam_result, true);
            $exam_result[$exam_type] = $results[$exam_type];

            $r->exam_result = json_encode($exam_result);

            $flag = $this->isTestComplete($r->cashiering_transaction_id, $exam_result);
            $flag = $flag ? 2 : 1;
        } else {
            $r = new Result;
            $r->cashiering_transaction_id = $id;
            $r->exam_result = $results;
        }

        if ($r->save()) {
            if ($results) {
                $ct = CashieringTransaction::select('cashiering_transactions.*')
                ->where('cashiering_transactions.id', $id)->first();

                if ($ct) {
                    $ct->status = $flag;
                    $ct->save();
                }
            }
            
            return response(['data' => $r->exam_result, 'status' => $flag, 'success' => true]);
        }

        return response(['success' => false]);
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
