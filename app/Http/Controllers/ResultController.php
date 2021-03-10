<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ResultController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $data = [
        //     ['Fasting Blood Sugar', ''],
        //     ['Total Cholesterol', ''],
        //     ['Triglycerides', ''],
        //     ['HDL (Good Cholesterol', ''],
        //     ['LDL (Bad Cholesterol', ''],
        //     ['Uric Acid', ''],
        //     ['Creatinine', ''],
        //     ['Blood Urea Nitrogen', ''],
        //     ['SGOT', ''],
        //     ['SGPT', ''],
        //     ['HBa1c', ''],

        //     ['Blood Type', ''],
        //     ['RH Type', ''],

        //     ['Troponin I', ''],
        //     ['Troponin T', ''],
        //     ['Myoglobin', ''],
        //     ['Creatinine Kinase-(CK MB)', ''],
        //     ['C-Reactive Protein', ''],

        //     ['HBsAg (Qualitative)', ''],
        //     ['HBsAg (Quantitative)', ''],
        //     ['Anti-Hbs (Quantitative)', ''],
        //     ['HBeAg', ''],
        //     ['Anti-Hbe', ''],
        //     ['Anti-Hbc IgM', ''],
        //     ['Anti-Hbc IgG', ''],
        //     ['HAV IgG HAV IgM', ''],
        //     ['Anti HCV-IgM', ''],

        //     ['Sodium', ''],
        //     ['Potassium', ''],
        //     ['Calcium', ''],
        //     ['Chloride', ''],
        //     ['Phosporous', ''],
        //     ['Magnesium', ''],
        //     ['Others: Serum Osmolality', ''],
        //     ['Lithium', ''],

        //     ['Lacto Dehydrogenase (LDH)', ''],
        //     ['Gamma Glutamyl Transferase', ''],
        //     ['Amylase', ''],
        //     ['Lipase', ''],
        //     ['Cholinesterase', ''],
        //     ['SGPT/ALT', ''],
        //     ['SGOT/AST', ''],
        //     ['Creatinine Kinase', ''],
        //     ['Alkaline Phospatase', ''],

        //     ['Ascaris', ''],
        //     ['Hookworm ova', ''],
        //     ['Blastosistis Hominis', ''],
        //     ['Gardia Lambia', ''],
        //     ['S. Stercoralis Larva', ''],
        //     ['Trichuris ova', ''],
        //     ['Tapeworm', ''],
        //     ['Entamoeba cyst', ''],
        //     ['Entamoeba trophozoite', ''],
        //     ['Schistosoma ova', ''],
        //     ['Puss cells', ''],
        //     ['Red Blood Cells', ''],
        //     ['Fat Globules', ''],
        //     ['Yeast Cells', ''],
        //     ['Undigested Food', ''],
        // ];

        // $tests = [
        //     [0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10], // bloodchem standard
        //     [11, 12], // blood type
        //     [13, 14, 15, 16, 17], // cardiac markers
        //     [18, 19, 20, 21, 22, 23, 24, 25, 26], // complete hepatits profile
        //     [18, 19, 20, 21, 22, 23, 24, 25, 26], // electrolytes
        //     [27, 28, 29, 30, 31, 32, 33, 34], // electrolytes
        //     [35, 36, 37, 38, 39, 40, 41, 42, 43], // enzyme test
        //     [35, 36, 37, 38, 39, 40, 41, 42, 43], // fecalysis
        // ];

        $blood_chem_executive = [
            ['Fasting', '6.5 - 8.5 g/dL'],
            ['Total Cholesterol', '6.5 - 8.5 g/dL'],
            ['Triglycerides', '3.0 - 3.5'],
            ['HDL (Good Cholesterol)', '3.0 - 3.5'],
            ['LDL (Bad Cholesterol)', '3.0 - 3.5'],
            ['Uric Acid', '3.0 - 3.5'],
            ['Creatinine', '3.0 - 3.5'],
            ['Blood Urea Nitrogen', '3.0 - 3.5'],
            ['SGOT', '3.0 - 3.5'],
            ['SGPT', '3.0 - 3.5'],
            ['Sodium', '3.0 - 3.5'],
            ['Potassium', '3.0 - 3.5'],
            ['Calcium', '3.0 - 3.5'],
            ['Magnesium', '3.0 - 3.5'],
            ['Phosphorous', '3.0 - 3.5'],
            ['Chloride', '3.0 - 3.5']
        ];

        $blood_chem_full = [
            ['Fasting Blood Sugar', '6.5 - 8.5 g/dL'],
            ['Total Cholesterol', '6.5 - 8.5 g/dL'],
            ['Triglycerides', '3.0 - 3.5'],
            ['HDL (Good Cholesterol)', '3.0 - 3.5'],
            ['LDL (Bad Cholesterol)', '3.0 - 3.5'],
            ['Uric Acid', '3.0 - 3.5'],
            ['Creatinine', '3.0 - 3.5'],
            ['Blood Urea Nitrogen', '3.0 - 3.5'],
            ['SGOT', '3.0 - 3.5'],
            ['SGPT', '3.0 - 3.5'],

            ['Alkaline Phosphatase', '3.0 - 3.5'],
            ['Total Protein', '3.0 - 3.5'],
            ['Albumin', '3.0 - 3.5'],
            ['Globulin', '3.0 - 3.5'],
            ['A/G Ratio', '3.0 - 3.5'],
            ['Total Bilirubin', '3.0 - 3.5'],
            ['Direct Bilirubin', '3.0 - 3.5'],

            ['Sodium', '3.0 - 3.5'],
            ['Potassium', '3.0 - 3.5'],
            ['Calcium', '3.0 - 3.5'],
            ['Magnesium', '3.0 - 3.5'],
            ['Phosphorous', '3.0 - 3.5']
        ];

        $blood_chem_standard = [
            ['Fasting Blood Sugar', '6.5 - 8.5 g/dL'],
            ['Total Cholesterol', '6.5 - 8.5 g/dL'],
            ['Triglycerides', '3.0 - 3.5'],
            ['HDL (Good Cholesterol)', '3.0 - 3.5'],
            ['LDL (Bad Cholesterol)', '3.0 - 3.5'],
            ['Uric Acid', '3.0 - 3.5'],
            ['Creatinine', '3.0 - 3.5'],
            ['Blood Urea Nitrogen', '3.0 - 3.5'],
            ['SGOT', '3.0 - 3.5'],
            ['SGPT', '3.0 - 3.5'],
            ['HBa1c', '3.0 - 3.5']
        ];

        $blood_chem = [
            ['Total Protein', '6.5 - 8.5 g/dL'],
            ['Albumin', '6.5 - 8.5 g/dL'],
            ['Globulim', '3.0 - 3.5']
        ];

        $tibc_ferritin = [
            ['Ferritin', '6.5 - 8.5 g/dL'],
            ['Iron', '6.5 - 8.5 g/dL'],
            ['Total Iron Binding Capacity (TIBC)', '3.0 - 3.5'],
            ['Unsaturated Iron Binding Capacity', '3.0 - 3.5']
        ];

        return view('layouts.results',  [
            'blood_chem_executive' => $blood_chem_executive,
            'blood_chem_full' => $blood_chem_full,
            'blood_chem_standard' => $blood_chem_standard,
            'blood_chem' => $blood_chem,
            'tibc_ferritin' => $tibc_ferritin,
        ]);
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
        //
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
