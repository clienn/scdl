<?php

use Illuminate\Database\Seeder;

class ExamTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            [
                "Blood Chemistry", 
                ['TOTAL PROTEIN', '6.2 – 8.5 g/dL', '', 0],
                ['ALBUMIN', '3.5 – 5.3 g/dL', '', 0],
                ['GLOBULIN', '3.0 – 3.5', '', 0]
            ],
            [
                "Blood Chemistry Executive", 
                ['FASTING BLOOD SUGAR', '4.2 mmol/L - 6.4 mmol/L', '', 0],
                ['TOTAL CHOLESTEROL', '5.17 mmol/L - 6.21 mmol/L', '', 0],
                ['TRIGL YCERIDES', '"Female:0.4 mmol/L - 1.54 mmol/L~Male: 0.45 mmol/L-1.82 mmol/L"', '', 0],
                ['HDL (Good Cholesterol)', '"Female:0.4 mmol/L - 1.54 mmol/L~Male: 0.45 mmol/L-1.82 mmol/L"', '', 0],
                ['LDL (Bad Cholesterol)', '0 - 4.0 mmol/L', '', 0],
                ['URIC ACID', '"Male: 200.0 - 420.0 umol/L~Female: 140.0 - 340.0 umol/L"', '', 0],
                ['CREATININE', '"Male: 62.0 - 124.0 umol/L~Female: 62.0 - 106.0 umol/L"', '', 0],
                ['BLOOD UREA NITROGEN', '1.7 mmol/L - 8.3 mmol/L', '', 0],
                ['SGOT', '"Male: 0 up to 42 U/L~Female: 0 up to 32 U/L"', '', 0],
                ['SGPT', '"Male: 0 up to 42 U/L~Female: 0 up to 32 U/L"', '', 0],
                ['SODIUM', '135.0 mEq/L - 155.0 mEq/L', '', 0],
                ['POTASSIUM', '3.4 mEq/L - 5.3 mEq/L', '', 0],
                ['CALCIUM', '8.5- 10.5 g/dL', '', 0],
                ['MAGNESIUM', '0.8 mmol/L - 1.0 mmol/L', '', 0],
                ['PHOSPHOROUS', '2.5 mg/dl - 4.8 mg/dl', '', 0],
                ['CHLORIDE', '2.5 mg/dl - 4.8 mg/dl', '', 0]
            ],
            [
                "Blood Chemistry Full", 
                ['FASTING BLOOD SUGAR', '4.2 mmol/L - 6.4 mmol/L', '', 0],
                ['TOTAL CHOLESTEROL', 'Below 5.17 mmol', '', 0],
                ['TRYGLYCERIDES', '"Female:0.4 mmol/L - 1.54 mmol/L~Male: 0.45 mmol/L-1.82 mmol/L"', '', 0],
                ['HDL (Good Cholesterol)', '"Male: 0 - 1.42 mmol/L~Female: 0 - 1.68 mmol/L"', '', 0],
                ['LDL (Bad Cholesterol)', '0 - 4.0 mmol/L', '', 0],
                ['URIC ACID', '"Male: 200.0 - 420.0 umol/L~Female: 140.0 - 340.0 umol/L"', '', 0],
                ['CREATININE', '"Male: 62.0 - 124.0 umol/L~Female: 62.0 - 106.0 umol/L"', '', 0],
                ['BLOOD UREA NITROGEN', '1.7 mmol/L - 8.3 mmol/L', '', 0],
                ['SGOT', '"Male: 0 up to 42 U/L~Female: 0 up to 32 U/L"', '', 0],
                ['SGPT', '"Male: 0 up to 42 U/L~Female: 0 up to 32 U/L"', '', 0],
                ['ALKALINE PHOSPHATASE', '"Male: 80.0 - 306.0 U/L~Female: 64.0 - 306.0 U/L"', '', 0],
                ['TOTAL PROTEIN', '', '', 0],
                ['ALBUMIN', '39.7 g/L - 49.4 g/L', '', 0],
                ['GLOBULIN', '', '', 0],
                ['A/G RATIO', '', '', 0],
                ['TOTAL BILIRUBIN', 'Adults: up to 0.25 mg/dL', '', 0],
                ['DIRECT BILIRUBIN', 'Adults: up to 0.25 mg/dL', '', 0],
                ['SODIUM', '135.0 mEq/L - 155.0 mEq/L', '', 0],
                ['POTASSIUM', '3.4 mEq/L - 5.3 mEq/L', '', 0],
                ['CALCIUM', '2.04mmol/L - 2.50 mmol/L', '', 0],
                ['MAGNESIUM', '0.8 mmol/L - 1.0 mmol/L', '', 0],
                ['PHOSPHOROUS', '0.81mmol/L-1.62mmol/L', '', 0]
            ],
            [
                "Blood Chemistry Standard", 
                ['FASTING BLOOD SUGAR', '4.2 mmol/L - 6.4 mmol/L', '', 0],
                ['TOTAL CHOLESTEROL', 'Below 5.17 mmol', '', 0],
                ['TRIGLYCERIDES', '"Female:0.4 mmol/L - 1.54 mmol/L~Male: 0.45 mmol/L-1.82 mmol/L"', '', 0],
                ['HDL (Good Cholesterol)', '"Male: 0 - 1.42 mmol/L~Female: 0 - 1.68 mmol/L"', '', 0],
                ['LDL (Bad Cholesterol)', '0 - 4.0 mmol/L', '', 0],
                ['URIC ACID', '"Male: 200.0 - 420.0 umol/L~Female: 140.0 - 340.0 umol/L"', '', 0],
                ['CREATININE', '"Male: 62.0 - 124.0 umol/L~Female: 62.0 - 106.0 umol/L"', '', 0],
                ['BLOOD UREA NITROGEN', '1.7 mmol/L - 8.3 mmol/L', '', 0],
                ['SGOT', '"Male: 0 up to 42 U/L~Female: 0 up to 32 U/L"', '', 0],
                ['SGPT', '"Male: 0 up to 42 U/L~Female: 0 up to 32 U/L"', '', 0],
                ['HbA1c', '4.4 - 6.4%', '', 0]
            ],
            [
                "Blood Typing", 
                ['BLOOD TYPE:', 'AB, A, B, O', 'AB,A,B,O', 1],
                ['RH TYPE', 'RH+, RH-', 'RH+,RH-', 1],
            ],
            [
                "Cardiac Markers", 
                ['TROPONIN I', '0-0.2 ng/mL', '', 0],
                ['TROPONIN t', '0-0.2 ng/mL', '', 0],
                ['MYOGLOBIN', '"female : 1 - 66 ng/mL~male  :   17- 106ng/mL"', '', 0],
                ['CREATININE KINASE-(CK-MB)', '0-24 IU/L', '', 0],
                ['C-REACTIVE PROTEIN', '0-6 mg/L', '', 0]
            ],
            [
                "Complete hepatitis Profile", 
                ['HBsAg (Qualitative):', '', '', 0],
                ['HBsAg (Quantitative):', '"Reactive -  greater than 1.00~Non Reactive - less than 1.00"', '', 0],
                ['Anti-HBs(Quantitative):', '"Reactive - Above or Equal to 10 IU/L~Non Reactive - Below  10 IU/L"', '', 0],
                ['HBeAg', '"Positive -   greater than 0.105~Negative -  less than  0.105"', '', 0],
                ['Anti-Hbe', '"Positive - less than 0.81~Negative - greater than 0.81"', '', 0],
                ['Anti-Hbc IgM', '"Positive -  greater than 0.40~Negative - less than  0.40"', '', 0],
                ['Anti-Hbc IgG', '"Positive -  greater than 0.150~Negative - less than  0.150"', '', 0],
                ['HAV IgG/HAV IgM', '"Reactive -  greater than 0.150~Non Reactive - less than 0.150"', '', 0],
                ['Anti HCV - IgM', '"Positive -  greater than 0.105~Negative - less than  0.105"', '', 0]
            ],
            [
                "Electrolytes", 
                ['SODIUM', '135.0 mEq/L - 155.0 mEq/L', '', 0],
                ['POTASSIUM', '3.4 mEq/L - 5.3 mEq/L', '', 0],
                ['CALCIUM', '8.5 - 10.5 mg/dL', '', 0],
                ['CHLORIDE', '94-111 mmol/L', '', 0],
                ['PHOSPOROUS', '2.5mg/dL-4.8 mg/dL', '', 0],
                ['MAGNESIUM', '2.0 mmol/L - 3.0 mmol/L', '', 0],
                ['OTHER: SERUM OSMOLALITY', '', '', 0],
                ['LITHIUM', '', '', 0]
            ],
            [
                "Enzyme Test", 
                ['LACTO DEHYDROGENASE (LDH)', '"M - 80 - 285 IU/L~F - 103 - 227 IU/L"', '', 0],
                ['GAMMA GLUTAMYL TRANSFERASE', '"M- 0 - 45 IU/L~F- 0 - 30 IU/L"', '', 0],
                ['AMYLASE', '40- 180 U/L', '', 0],
                ['LIPASE', '"10 - 150 U/L above 60  years old = 18 -180 U/L"', '', 0],
                ['CHOLINESTERASE', '"Male: 0 up to 42 U/L~Female: 0 up to 32 U/L"', '', 0],
                ['SGPT/ALT', '"Male: 0 up to 42 U/L~Female: 0 up to 32 U/L"', '', 0],
                ['CREATININE KINASE', '0- 25 IU/L', '', 0],
                ['ALKALINE PHOSPATASE', '"Male: 80.0 - 306.0 U/L~Female: 64.0 - 306.0 U/L"', '', 0]
            ],
            [
                "Fecalysis", 
                ['Color', '', 'BROWN,BREENISH BROWN,YELLOWISH BROWN,WHITISH BROWN,REDDISH BROWN,GRAYISH BROWN,YELLOW,GRENISH YELLOW,WHITISH YELLOW,GRAYISH YELLOW,BLACK,GREEN', 1],
                ['Consistency', '', 'FORMED,SOFT,WATERY,WATERY MUCOID,MUCOID', 0],
                ['KATO-KATZ', '', '', 0],
                ['Ascaris', '', '', 0],
                ['Hookworm ova', '', '', 0],
                ['Blastosistis hominis', '', '', 0],
                ['Gardia Lambia', '', '', 0],
                ['S. stercoralis larva', '', '', 0],
                ['Trichuris ova', '', '', 0],
                ['Tapeworm', '', '', 0],
                ['Entamoeba cyst', '', '', 0],
                ['Entamoeba trophozoite', '', '', 0],
                ['Schistosoma ova', '', '', 0],
                ['Pus Cells', '', '', 0],
                ['Red Blood Cells', '', '', 0],
                ['Fat Globules', '', '', 0],
                ['Yeast Cells', '', '', 0],
                ['Undigested Food', '', '', 0]
            ],
            [
                "CBC", 
                ['HEMOGLOBIN', '"F:(120 - 140) g/l M:(135 - 160) g/l"', '', 0],
                ['HEMATOCRIT', '"F:(0.37 - 0.45) M:(0.40 - 0.48)"', '', 0],
                ['WBC', '(5 - 10) x 10 g /l', '', 0],
                ['PLATELETS', '(150 - 395) x 10 9 / L', '', 0],
                ['SEGMENTERS', '(0,55 - 0,65)', '', 0],
                ['LYMPHOCYTES', '(0,20 - 0,35)', '', 0],
                ['MONOCYTES', '(0,02 - 0,06)', '', 0],
                ['EOSINOPHILS', '(0,01 - 0,03)', '', 0],
                ['BASOPHILS', '(0,0 - 0,05)', '', 0]
            ],
            [
                "Urinalysis", 
                ['Color', '', '', 0],
                ['Appearance', '', '', 0],
                ['Ph', '', '', 0],
                ['SP. Gravity', '', '', 0],
                ['Protein', '', '', 0],
                ['Sugar', '', '', 0],
                ['WBC', '', '', 0],
                ['RBC', '', '', 0],
                ['Epith Cell', '', '', 0],
                ['Crystals', '', '', 0],
                ['Mucus T', '', '', 0]
            ],
            [
                "Hematology", 
                ['HEMOGLOBIN', '"F:(120 - 140) g/l~M:(135 - 160) g/l"', '', 0],
                ['HEMATOCRIT', '"F:(0.37 - 0.45)~M:(0.40 - 0.48)"', '', 0],
                ['WBC', '(5 - 10) x 100g /l', '', 0],
                ['SEGMENTERS', '(0,55 - 0,65)', '', 0],
                ['STAB', '(0,01 - 0,05)', '', 0],
                ['LUMPHOCYTES', '(0,25 - 0,40)', '', 0],
                ['MONOCYTES', '(0,02 - 0,06)', '', 0],
                ['EOSINOPHILS', '(0,01 - 0,05)', '', 0],
                ['BASOPHILS', '(0,0 - 0,05)', '', 0],
                ['PLATELETS', '(150 - 395) x 1009 / Ll.', '', 0],
                ['RETICULOCYTE', '(0, 005 - 0,015)', '', 0],
                ['RBC', '"F:(3.8 – 5.1 10^6 / µL~M:( 4.2 – 5.6 10^6 / µL )"', '', 0],
                ['ESR (Sedimentation Rate)', '"F:(0 - 20 mm. / hr)~M:(0-15mm. / hr)"', '', 0],
                ['Malarial Smear', '', '', 0],
                ['Bleeding Time', '1-3 mins.', '', 0],
                ['Clotting Time', '3-6 min.', '', 0],
                ['Blood Time', '', '', 0],
                ['Blood Type', '', '', 0],
                ['RH Type', '', '', 0]
            ],
            [
                "Hepatitis Profile", 
                ['HBsAg Qualitative', 'less than 1.00', '', 0],
                ['HBsAgTiter', '', '', 0],
                ['ANTI-HBs titer', '10 IU/L', '', 0],
                ['HBeAg', 'less than 0.105', '', 0],
                ['Anti HBeAg', 'greater than 0.81', '', 0],
                ['HBc IgM', 'less than 0.105', '', 0],
                ['ANTI-HCV IgM', 'less than 0.105', '', 0],
                ['ANTI-HAV IgM Qualitative', '', '', 0],
                ['ANTI-HAV IgM Titer', 'less than 0.105', '', 0],
                ['ANTI-HAV IgG Titer', 'less than 1.50', '', 0]
            ],
            [
                "Hormones", 
                ['ESTROGEN', '"male: less than 60 pg/ml~female: ~postmenupausal phase: less than 18 pg/ml~ovulating phase: 30 - 100 pg/ml~late follicular phase: 100 - 400 pg/ml~luteal phase: 60 - 150 pg/ml~pregnant: up to 35,000 pg/ml"', '', 0],
                ['PROGESTERONE', '"follicular phase : 0.20 - 1.4 ng/ml~luteal phase: 4 -25 ng/ml~menopausal phase : 0.1 - 1.0 ng/ml~male: 0.1 - 1.2 ng/ml"', '', 0],
                ['FSH', '"follicular phase: 0- 20 miu/ml~mid cycle: 15- 30 miu/ml~luteal phase: 0 -20 miu/ml~postmenupausal phase: 40 - 200 miu/ml~male : 0 -20 miu/ml"', '', 0],
                ['LH', '"follicular phase: less than 20 miu/ml~surge phase: more than 40 miu/ml (40- 200)"', '', 0],
                ['PROLACTIN', '"male: 1- 18 yrs old - 1-15 ng/ml~> 19 yrs: 4-23 ng/ml~females: 1- 18 yrs old - 1 -15 ng/ml~> 19 yrs: 4-30 ng/ml"', '', 0],
                ['CORTISOL', '"ADULT: 5-23UG/DL 3-13UG/DL~CHILD: 3-21 UG/DL 3-10UG/DL~NEWBORN: 1-24UG/DL"', '', 0]
            ],
            [
                "LIVER PROFILE", 
                ['SGOT', '"Male: 0 up to 42 U/L~Female: 0 up to 32 U/L"', '', 0],
                ['SGPT', '"Male: 0 up to 42 U/L~Female: 0 up to 32 U/L"', '', 0],
                ['Total Bilirubin', '1.1 g/dL  (Adult)', '', 0],
                ['Indirect Bilirubin', 'up to 0.85 g/dL', '', 0],
                ['Direct Bilirubin', '0.25 g/dL', '', 0],
                ['Alkaline Phospatase', '"Male: 80.0 - 306.0 U/L~Female: 64.0 - 306.0 U/L"', '', 0],
                ['Gamma Glutamyl Transferase', '"Male : 0-45 IU/L~Female : 0-30 IU/L"', '', 0]
            ],
            [
                "Medical Evaluation", 
                ['BLOOD PRESSURE', '', '', 0],
                ['WEIGHT', '', '', 0],
                ['HEIGHT', '', '', 0],
                ['BMI', '', '', 0],
                ['BLOOD TYPE', '', '', 0],
                ['BLOOD TYPE', '', '', 0]
            ],
            [
                "Oral Glucose Tolerance Test", 
                ['FASTING', '4.2 - 6.4 mmol/L', '', 0],
                ['1 HOUR', 'less than 11.1 mmol/L', '', 0],
                ['2 HOUR', 'less than 7.8 mmol/L', '', 0],
                ['3 HOUR', 'less than 6.4 mmol/L', '', 0]
            ],
            [
                "SEROLOGY TEST FOR SLE", 
                ['Anti-Ds DNA', '"Negative: Less than 16.0 U/ml~Equivocal: 16.0- 24.0 U/ml~Positive: Greater than 24.0 u/ml"', '', 0],
                ['Anti Nuclear Antibody', '"Negative: Less than 1.3~Equivocal: 1.3-3.7~Positive: Greater 3.7"', '', 0],
                ['Anti-Streptolysin O Titer', '"Negative: Less than 2 U/L~Positive: Greater than 2 U/L"', '', 0],
                ['Rheumatoid Factor', '"Negative: Less than 2 U/L~Positive: Greater than 2 U/L"', '', 0],
                ['C-Reactive Protein', 'less than 6mg/L', '', 0],
                ['ESR (Sedimentation Rate)', '"Female: 0-20 mm/hr~Male: 0-15 mm/hr"', '', 0]
            ],
            [
                "Thyroid Profile Test", 
                ['T3', '0.80 - 1.90 ng/ml', '', 0],
                ['T4', '4.50 - 12.00 ug/dl', '', 0],
                ['TSH', '0.470 - 4.640 uIU/ml', '', 0],
                ['FT4', '9.0 - 23.0 pm/L', '', 0],
                ['FT3', '1.4 - 4.2 pg/mL', '', 0]
            ],
            [
                "TIBC and Ferritin Test", 
                ['Ferritin', '"CHILDREN:7-140 ng/ml FEMALE:18-160 MALE:18-270 NEWBORN:"', '', 0],
                ['IRON', '60 -150 ug/dL', '', 0],
                ['Total IRON Binding Capacity', '250-450 ug/dL', '', 0],
                ['Unsaturated Iron Binding Capacity', '', '', 0]
            ],
            [
                "TUMOR MARKERS Test", 
                ['CA 125 (Ovary)', '0 - 35 u/mL', '', 0],
                ['CA 15-3 (breast)', '0 - 28 u/mL', '', 0],
                ['CA 19-9 (Pancreas)', '0 - 37 u/mL', '', 0],
                ['AFP (Alpha feto Protein)', '0 - 2 ng/mL', '', 0],
                ['CEA (Carcino Embryonic Antigen)', '0 - 10 ng/L', '', 0],
                ['PSA (Prostatic Specific Antigen)', '0 - 4 ng/mL', '', 0]
            ],
            [
                "Hepa",
                ['Hepa', '', 'Positive,Negative', 1]
            ],
            [
                "Pregnancy Test",
                ['Pregnancy Test', '', 'Positive,Negative', 1]
            ],
            [
                "Others",
                ['Others', '', '', 2]
            ]
        ];
        
        $exams = [];
        $exam_categories = [];
        $exam_items = [];
        $curr_idx = 1;

        foreach($data as $key => $val) {
            $len = count($val);
            $ids = '';

            $exams[] = [
                'name' => $val[0], 
                'exam_category_id' => $key + 1
            ];

            for ($i = 1; $i < $len; ++$i) {
                $exam_items[] = [
                    'description' => $val[$i][0],
                    'normal_values' => $val[$i][1],
                    'choices' => $val[$i][2],
                    'type' => $val[$i][3]
                ];

                $ids .= $curr_idx++ . ',';
            }

            $exam_categories[] = [
                'name' => $val[0], 
                'exam_type_ids' => substr($ids, 0, -1)
            ];
        }

        DB::table('exam_categories')->truncate();
        DB::table('exam_categories')->insert($exam_categories);

        DB::table('exam_types')->truncate();
        DB::table('exam_types')->insert($exam_items);

        DB::table('exams')->truncate();
        DB::table('exams')->insert($exams);

        $packages = [
            ['name' => 'Basic 3'],
            ['name' => 'Pregnancy Test and Hepa B'],
            ['name' => 'Blood Typing'],
            ['name' => 'Serology'],
            ['name' => 'Health Card'],
            ['name' => 'PNTC Test']
        ];

        DB::table('packages')->truncate();
        DB::table('packages')->insert($packages);

        $tmp = [
            [11, 12, 10],
            [11, 5, 12, 24, 23, 25],
            [11, 5, 12, 10],
            [11, 19, 12, 10],
            [12, 10],
            [11, 19, 12, 10]
        ];

        $package_exams = [];

        foreach($tmp as $key => $val) {
            foreach($val as $id) {
                $package_exams[] = [
                    'user_id' => 1,
                    'package_id' => $key + 1,
                    'exam_id' => $id,
                ];
            }
        }

        DB::table('package_exams')->truncate();
        DB::table('package_exams')->insert($package_exams);
    }
}
