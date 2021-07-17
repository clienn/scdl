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
        DB::table('exam_categories')->truncate();

        DB::table('exam_types')->truncate();
        DB::table('exam_types')->insert($this->getExamTypes());

        DB::table('exams')->truncate();
        DB::table('exams')->insert($this->getExams());

        DB::table('packages')->truncate();
        DB::table('packages')->insert($this->getPackages());

        DB::table('package_exams')->truncate();
        DB::table('package_exams')->insert($this->getPackageExams());
    }

    private function getExamTypes() {
        // [`id`, `description`, `normal_values`, `choices`, `type`, `created_at`, `updated_at`],
        
        $exam_types = [
            [1, 'PROTEIN', '6.2 - 8.5 g/dL', NULL, 0, '2021-07-03 12:48:56', '2021-07-03 15:52:54'],
            [2, 'Albumin', '3.5 - 5.3 g/dL', NULL, 0, '2021-07-03 12:50:28', '2021-07-03 12:57:02'],
            [3, 'Globulin', '3.0 3.5', NULL, 0, '2021-07-03 12:50:57', '2021-07-03 12:57:23'],
            [4, 'Alkaline Photosphatase', '25.0 - 147.0 U/L', NULL, 0, '2021-07-03 12:56:50', '2021-07-03 12:56:50'],
            [5, 'Calcium', '8.8 - 10.2 mg/dl', NULL, 0, '2021-07-03 12:58:32', '2021-07-03 12:58:32'],
            [6, 'Chloride', NULL, NULL, 0, '2021-07-03 12:59:15', '2021-07-03 12:59:15'],
            [7, 'CREATININE', 'Male: 62.0 - 124.0 umoI/L ~ Female: 62.0 -106.0 umoI/L ~', NULL, 0, '2021-07-03 13:01:23', '2021-07-03 14:34:59'],
            [8, 'Fasting blood sugar', '4.2mmoI/L -6.4mmoI/L', NULL, 0, '2021-07-03 13:03:36', '2021-07-03 13:03:36'],
            [9, 'HBa1c', '4.4 5 - 6.4%', NULL, 0, '2021-07-03 13:04:18', '2021-07-03 13:04:18'],
            [10, 'HDL(Good Cholesterol)', 'Male: 0 - 1.42mmoI/L  ~ Female: 0-1.68mmoI/L', NULL, 0, '2021-07-03 13:05:53', '2021-07-03 14:34:30'],
            [11, 'LDL(Bad Cholesterol)', '0-4 mmoI/L', NULL, 0, '2021-07-03 13:06:30', '2021-07-03 13:06:30'],
            [12, 'Magnesium', '0.8 mmoI/L - 1.0mmo/L', NULL, 0, '2021-07-03 13:07:21', '2021-07-03 13:07:21'],
            [13, 'Phosphorous', '0.81 mmoI/L - 1.62 mmoI/L', NULL, 0, '2021-07-03 13:08:54', '2021-07-03 13:08:54'],
            [14, 'Potassium', '3.6 - 5.5 mmoI/L', NULL, 0, '2021-07-03 13:10:13', '2021-07-03 13:10:13'],
            [15, 'SGOT', 'Male: 0 up to 42 U/L ~ Female: 0 up to 32 U/L', NULL, 0, '2021-07-03 13:11:05', '2021-07-03 14:35:57'],
            [16, 'SGPT', 'Male: 0 up to 42 U/L ~ Female: 0 up to 32 U/L', NULL, 0, '2021-07-03 13:11:36', '2021-07-03 14:36:20'],
            [17, 'Sodium', '128.0 - 160.0 mmoI/L', NULL, 0, '2021-07-03 13:12:11', '2021-07-03 13:12:11'],
            [18, 'Total Cholesterol', 'Below 5.17 mmol', NULL, 0, '2021-07-03 13:12:38', '2021-07-03 13:32:26'],
            [19, 'TRIGLYCERIDES', 'Female: 0.4 mmoI/L - 1.54 mmoI/L ~ Male: 0.45 mmoI/L', NULL, 0, '2021-07-03 13:14:27', '2021-07-03 14:36:43'],
            [20, 'URIC ACID', 'Male: 200.0 - 420.0 umoI/L ~ Female: 140.0 - 340.0 umoI/L', NULL, 0, '2021-07-03 13:15:41', '2021-07-03 14:37:00'],
            [21, 'BLOOD UREA NITROGEN', '1.7mmoI/L - 8.3mmoI/L', NULL, 0, '2021-07-03 13:22:46', '2021-07-03 13:22:46'],
            [22, 'A/G', NULL, NULL, 0, '2021-07-03 13:27:25', '2021-07-03 13:27:25'],
            [23, 'TOTAL BILIRUBIN', 'Adults: up to 1.1 mg/dl', NULL, 0, '2021-07-03 13:28:13', '2021-07-03 13:28:13'],
            [24, 'DIRECT BILIRUBIN', 'Adults: up to 0.25 mg/dl', NULL, 0, '2021-07-03 13:28:59', '2021-07-03 13:28:59'],
            [25, 'TOTAL PROTEIN', NULL, NULL, 0, '2021-07-03 13:29:20', '2021-07-03 13:29:20'],
            [26, 'BLOOD TYPE', NULL, 'O,B,A,AB', 1, '2021-07-03 13:39:20', '2021-07-03 13:53:00'],
            [27, 'RH TYPE', NULL, 'RH-,RH+', 1, '2021-07-03 13:53:57', '2021-07-03 13:53:57'],
            [28, 'TROPONIN I', '0-0.2 ng/mL', NULL, 0, '2021-07-03 13:56:59', '2021-07-03 13:56:59'],
            [29, 'TROPONIN T', '0-0.2 ng/mL', NULL, 0, '2021-07-03 13:57:29', '2021-07-03 13:57:29'],
            [30, 'MYOGLOBIN', 'female: 1 - 66 ng/mL ~ male:   17- 106ng/mL', NULL, 0, '2021-07-03 13:58:13', '2021-07-03 14:35:40'],
            [31, 'CREATININE KINASE-(CK MB)', '0-24 IU/L', NULL, 0, '2021-07-03 13:59:34', '2021-07-03 13:59:34'],
            [32, 'C-REACTIVE PROTEIN', '0-6 mg/L', NULL, 0, '2021-07-03 14:00:03', '2021-07-03 14:00:03'],
            [33, 'HBsAg (Qualitative)', NULL, NULL, 0, '2021-07-03 14:03:15', '2021-07-03 14:03:15'],
            [34, 'HBsAg (Quantitative)', 'Reactive -  greater than 1.00 ~ Non Reactive - less than 1.00', NULL, 0, '2021-07-03 14:04:07', '2021-07-03 14:35:21'],
            [35, 'Anti - Hbs (Quantitative)', 'Reactive - Above or Equal to 10 IU/L ~ Non Reactive - Below  10 IU/L', NULL, 0, '2021-07-03 14:38:56', '2021-07-03 14:38:56'],
            [36, 'HBeAg', 'Positive -   greater than 0.105 ~ Negative -  less than  0.105', NULL, 0, '2021-07-03 14:39:31', '2021-07-03 14:39:31'],
            [37, 'Anti - Hbe', 'Positive - less than 0.81 ~ Negative - greater than 0.81', NULL, 0, '2021-07-03 14:40:44', '2021-07-03 14:40:44'],
            [38, 'Anti - Hbc IgM', 'Positive -  greater than 0.40 ~ Negative - less than  0.40', NULL, 0, '2021-07-03 14:41:30', '2021-07-03 14:41:30'],
            [39, 'Anti - Hbc IgG', 'Positive -  greater than 0.150 ~ Negative - less than  0.150', NULL, 0, '2021-07-03 14:42:47', '2021-07-03 14:42:47'],
            [40, 'HAV IgG/HAV IgM', 'Reactive -  greater than 0.150 ~Non Reactive - less than 0.150', NULL, 0, '2021-07-03 14:43:38', '2021-07-03 14:43:38'],
            [41, 'Anti HCV - IgM', 'Positive -  greater than 0.105 ~Negative - less than  0.105', NULL, 0, '2021-07-03 14:44:22', '2021-07-03 14:44:22'],
            [42, 'SERUM OSMOLALITY', NULL, NULL, 0, '2021-07-03 14:55:58', '2021-07-03 14:55:58'],
            [43, 'LITHIUM', NULL, NULL, 0, '2021-07-03 14:56:14', '2021-07-03 14:56:14'],
            [44, 'LACTO DEHYDROGENASE (LDH)', 'M - 80 - 285 IU/L ~ F - 103 - 227 IU/L', NULL, 0, '2021-07-03 14:59:43', '2021-07-03 14:59:43'],
            [45, 'GAMMA GLUTAMYL TRANFERASE', 'M- 0 - 45 IU/L ~ F- 0 - 30 IU/L', NULL, 0, '2021-07-03 15:00:23', '2021-07-03 15:00:23'],
            [46, 'AMYLASE', '40- 180 U/L', NULL, 0, '2021-07-03 15:00:50', '2021-07-03 15:00:50'],
            [47, 'LIPASE', '10 - 150 U/L ~ above 60  years old = 18 -180 U/L', NULL, 0, '2021-07-03 15:01:28', '2021-07-03 15:01:28'],
            [48, 'CHOLINESTERASE', NULL, NULL, 0, '2021-07-03 15:01:53', '2021-07-03 15:01:53'],
            [49, 'SGPT/ALT', 'Male: 0 up to 42 U/L ~ Female: 0 up to 32 U/L', NULL, 0, '2021-07-03 15:02:24', '2021-07-03 15:02:24'],
            [50, 'SGOT/AST', 'Male: 0 up to 42 U/L ~ Female: 0 up to 32 U/L', NULL, 0, '2021-07-03 15:02:51', '2021-07-03 15:02:51'],
            [51, 'CREATININE KINASE', '0- 25 IU/L', NULL, 0, '2021-07-03 15:03:29', '2021-07-03 15:03:29'],
            [52, 'ALKALINE PHOSPATASE', 'Male: 80.0 - 306.0 U/L ~ Female: 64.0 - 306.0 U/L', NULL, 0, '2021-07-03 15:04:41', '2021-07-03 15:04:41'],
            [53, 'Ascaris', NULL, NULL, 0, '2021-07-03 15:07:22', '2021-07-03 15:07:47'],
            [54, 'Hookworm ova', NULL, NULL, 0, '2021-07-03 15:08:13', '2021-07-03 15:08:13'],
            [55, 'Blastosistis Hominis', NULL, NULL, 0, '2021-07-03 15:08:59', '2021-07-03 15:08:59'],
            [56, 'Gardia lambia', NULL, NULL, 0, '2021-07-03 15:09:15', '2021-07-03 15:09:15'],
            [57, 'S. Stercoralis larva', NULL, NULL, 0, '2021-07-03 15:09:39', '2021-07-03 15:09:39'],
            [58, 'Trichuris ova', NULL, NULL, 0, '2021-07-03 15:09:54', '2021-07-03 15:09:54'],
            [59, 'Tapeworm', NULL, NULL, 0, '2021-07-03 15:10:11', '2021-07-03 15:10:11'],
            [60, 'Entamoeba Cyst', NULL, NULL, 0, '2021-07-03 15:10:38', '2021-07-03 15:10:38'],
            [61, 'Entamoeba Trophozoite', NULL, NULL, 0, '2021-07-03 15:11:01', '2021-07-03 15:11:01'],
            [62, 'Schistosoma Ova', NULL, NULL, 0, '2021-07-03 15:11:22', '2021-07-03 15:11:22'],
            [63, 'Pus cells', NULL, NULL, 0, '2021-07-03 15:11:36', '2021-07-03 15:11:36'],
            [64, 'Red Blood Cells', NULL, NULL, 0, '2021-07-03 15:11:54', '2021-07-03 15:11:54'],
            [65, 'Fat Globules', NULL, NULL, 0, '2021-07-03 15:12:09', '2021-07-03 15:12:09'],
            [66, 'Yeast Cells', NULL, NULL, 0, '2021-07-03 15:12:23', '2021-07-03 15:12:23'],
            [67, 'Undigested Food', NULL, NULL, 0, '2021-07-03 15:12:47', '2021-07-03 15:12:47'],
            [68, 'FINDINGS', NULL, NULL, 2, '2021-07-03 15:13:04', '2021-07-03 15:13:04'],
            [69, 'COLOR', NULL, 'GREEN,BLACK,GRAYISH YELLOW,REDDISH YELLOW,WHITISH YELLOW,GREENISH YELLOW,YELLOW,GRAYISH BROWN,REDDISH BROWN,WHITISH BROWN,YELLOWISH BROWN,GREENISH BROWN,BROWN', 1, '2021-07-03 15:18:30', '2021-07-03 15:18:30'],
            [70, 'CONSISTENCY', NULL, 'MUCOID,WATERY MUCOID,WATERY,SOFT,FORMED', 1, '2021-07-03 15:19:51', '2021-07-03 15:19:51'],
            [71, 'KATO-KATZ', NULL, NULL, 0, '2021-07-03 15:25:15', '2021-07-03 15:25:15'],
            [72, 'HEMOGLOBIN', 'F:(120 - 140) g/l  ~ M:(135 - 160) g/l', NULL, 0, '2021-07-03 15:28:31', '2021-07-03 15:28:31'],
            [73, 'HEMATOCRIT', 'F:(0.37 - 0.45)  ~ M:(0.40 - 0.48)', NULL, 0, '2021-07-03 15:28:54', '2021-07-03 15:28:54'],
            [74, 'WBC', '(5 - 10) x 10 g /l', NULL, 0, '2021-07-03 15:29:04', '2021-07-03 15:29:04'],
            [75, 'PLATELETS', '(150 - 395) x 10 9 / L', NULL, 0, '2021-07-03 15:29:28', '2021-07-03 15:29:28'],
            [76, 'SEGMENTERS', '(0,55 - 0,65)', NULL, 0, '2021-07-03 15:29:51', '2021-07-03 15:29:51'],
            [77, 'LYMPHOCYTES', '(0,20 - 0,35)', NULL, 0, '2021-07-03 15:30:12', '2021-07-03 15:30:12'],
            [78, 'MONOCYTES', '(0,02 - 0,06)', NULL, 0, '2021-07-03 15:30:26', '2021-07-03 15:30:26'],
            [79, 'EOSINOPHILS', '(0,01 - 0,03)', NULL, 0, '2021-07-03 15:31:15', '2021-07-03 15:31:15'],
            [80, 'BASOPHILS', '(0,0 - 0,05)', NULL, 0, '2021-07-03 15:31:31', '2021-07-03 15:31:31'],
            [81, 'NOTE: FOR MEDICAL EVALUATION REPORT', NULL, 'WITH FINDINGS,NORMAL', 1, '2021-07-03 15:33:35', '2021-07-03 15:33:35'],
            [82, 'STAB', '(0,01 - 0,05)', NULL, 0, '2021-07-03 15:36:45', '2021-07-03 15:36:45'],
            [83, 'Urine Color', NULL, 'AMBER,DARK YELLOW,LIGHT YELLOW,STRAW,YELLOW', 1, '2021-07-03 15:40:14', '2021-07-03 15:40:55'],
            [84, 'Appearance', NULL, 'CLOUDY,HAZY,CLEAR', 1, '2021-07-03 15:41:47', '2021-07-03 15:41:47'],
            [85, 'PH', NULL, '8.0,7.0,6.0,5.0', 1, '2021-07-03 15:42:22', '2021-07-03 15:42:22'],
            [86, 'SP. Gravity', NULL, '1.030,1.025,1.020,1.015,1.010,1.005', 1, '2021-07-03 15:43:29', '2021-07-03 15:43:29'],
            [87, 'Protein', NULL, '4+,3+,2+,1+,Trace,Negative', 1, '2021-07-03 15:44:21', '2021-07-03 15:44:21'],
            [88, 'Sugar', NULL, '4+,3+,2+,1+,Trace,Negative', 1, '2021-07-03 15:45:36', '2021-07-03 15:45:36'],
            [89, 'WBC', '/HPF', NULL, 0, '2021-07-03 15:46:42', '2021-07-03 15:46:42'],
            [90, 'RBC', '/HPF', NULL, 0, '2021-07-03 15:47:05', '2021-07-03 15:47:05'],
            [91, 'Epith Cells', NULL, 'Many,Moderate,Few,Rare', 1, '2021-07-03 15:47:55', '2021-07-03 15:47:55'],
            [92, 'Others', NULL, NULL, 0, '2021-07-03 15:49:22', '2021-07-03 15:49:22'],
            [93, 'Crystals', NULL, NULL, 0, '2021-07-03 15:49:45', '2021-07-03 15:49:45'],
            [94, 'Mucus T', NULL, 'Many,Moderate,Few,Rare', 1, '2021-07-03 15:50:26', '2021-07-03 15:50:26'],
            [95, 'MICROSCOPIC', NULL, NULL, 0, '2021-07-03 15:55:50', '2021-07-03 15:55:50'],
            [96, 'Pregnancy', NULL, 'POSITIVE,NEGATIVE,N/A', 1, '2021-07-03 16:06:52', '2021-07-03 16:06:52'],
            [97, 'HEPA B', NULL, 'NON-REACTIVE,REACTIVE,N/A', 1, '2021-07-03 16:07:34', '2021-07-03 16:07:34'],
            [98, 'HCG', NULL, 'Positive,Negative', 1, '2021-07-03 16:18:26', '2021-07-03 16:18:26'],
            [99, 'VDRL', NULL, 'Positive,Negative', 1, '2021-07-03 16:18:52', '2021-07-03 16:18:52'],
            [100, 'HEPA BsAg', NULL, 'Reactive', 1, '2021-07-03 16:19:27', '2021-07-03 16:19:27'],
            [101, 'RETICULOCYTE', '(0, 005 - 0,015)', NULL, 0, '2021-07-03 16:28:48', '2021-07-03 16:28:48'],
            [102, 'ESR (Sedimentation Rate)', 'F:(0 - 20 mm. / hr) ~ M:(0-15mm. / hr)', NULL, 0, '2021-07-03 16:29:17', '2021-07-03 16:29:56'],
            [103, 'Malarial Smear', NULL, NULL, 0, '2021-07-03 16:30:22', '2021-07-03 16:30:22'],
            [104, 'Bleeding Time', '1-3 mins.', NULL, 0, '2021-07-03 16:30:42', '2021-07-03 16:30:42'],
            [105, 'Clotting Time', '3-6 min.', NULL, 0, '2021-07-03 16:31:04', '2021-07-03 16:31:04'],
            [106, 'HBsAg Titer', 'less than  1.00', NULL, 0, '2021-07-03 16:36:22', '2021-07-03 16:36:22'],
            [107, 'Anti-HBs Qualitative', NULL, NULL, 0, '2021-07-03 16:37:28', '2021-07-03 16:37:28'],
            [108, 'Anti-HBs Titer', '10 IU/L', NULL, 0, '2021-07-03 16:38:00', '2021-07-03 16:38:00'],
            [109, 'HBeAg', 'less than 0.105', NULL, 0, '2021-07-03 16:38:13', '2021-07-03 16:38:13'],
            [111, 'Anti HBeAg', 'greater than 0.81', NULL, 0, '2021-07-03 16:39:15', '2021-07-03 16:39:15'],
            [112, 'HBc IgM', 'less than 0.105', NULL, 0, '2021-07-03 16:39:41', '2021-07-03 16:39:41'],
            [113, 'ANTI-HCV IgM', 'less than 0.105', NULL, 0, '2021-07-03 16:40:10', '2021-07-03 16:40:10'],
            [114, 'Anti-HAV IgM Qualitative', NULL, NULL, 0, '2021-07-03 16:40:44', '2021-07-03 16:40:44'],
            [115, 'Anti-HAV IgM Titer', 'less than 0.105', NULL, 0, '2021-07-03 16:41:15', '2021-07-03 16:41:15'],
            [116, 'Anti-HAV IgG Titer', 'less than 1.50', NULL, 0, '2021-07-03 16:41:49', '2021-07-03 16:41:49'],
            [117, 'ESTROGEN', 'male: less than 60 pg/ml 						female : 						postmenupausal phase : less than 18 pg/ml 						ovulating phase : 30 - 100 pg/ml 						late follicular phase : 100 - 400 pg/ml 						luteal phase ; 60 - 150 pg/ml 						pregnant : up to 35,000 pg/ml', NULL, 0, '2021-07-03 16:52:07', '2021-07-03 16:52:07'],
            [118, 'PROGESTERONE', 'follicular phase : 0.20 - 1.4 ng/ml 						luteal phase : 4 -25 ng/ml 						menopausal phase : 0.1 - 1.0 ng/ml 						male :0.1 - 1.2 ng/ml', NULL, 0, '2021-07-03 16:52:29', '2021-07-03 16:52:29'],
            [119, 'FSH', 'follicular phase ;0- 20 miu/ml 						mid cycle : 15- 30 miu/ml 						luteal phase : 0 -20 miu/ml 						postmenupausal phase : 40 - 200 miu/ml 						male : 0 -20 miu/ml', NULL, 0, '2021-07-03 16:52:43', '2021-07-03 16:52:43'],
            [120, 'LH', 'follicular phase : less than 20 miu/ml 						surge phase : more than 40 miu/ml (40- 200)', NULL, 0, '2021-07-03 16:52:57', '2021-07-03 16:52:57'],
            [121, 'PROLACTIN', 'male : 1- 18 yrs old - 1-15 ng/ml 						> 19 yrs : 4-23 ng/ml 						females : 1- 18 yrs old - 1 -15 ng/ml 						> 19 yrs : 4-30 ng/ml', NULL, 0, '2021-07-03 16:53:14', '2021-07-03 16:53:14'],
            [122, 'CORTISOL', 'MORNING                 AFTERNOON ADULT	     5-23UG/DL              3-13UG/DL		 CHILD	     3-21 UG/DL             3-10UG/DL		 NEWBORN     1-24UG/DL', NULL, 0, '2021-07-03 16:55:15', '2021-07-03 16:55:15'],
            [123, 'INDIRECT BILIRUBIN', 'up to 0.85 g/dL', NULL, 0, '2021-07-03 17:04:55', '2021-07-03 17:04:55'],
            [124, 'BLOOD PRESSURE', NULL, NULL, 0, '2021-07-03 17:08:08', '2021-07-03 17:08:08'],
            [125, 'HEIGHT', NULL, NULL, 0, '2021-07-03 17:08:17', '2021-07-03 17:08:17'],
            [126, 'Blood Type', NULL, 'O,B,A,AB,O-,B-,A-, AB-,O+,B+,A+,AB+', 1, '2021-07-03 17:10:09', '2021-07-03 17:10:09'],
            [127, 'Weight', NULL, NULL, 0, '2021-07-03 17:10:27', '2021-07-03 17:10:27'],
            [128, 'BMI', NULL, NULL, 0, '2021-07-03 17:10:34', '2021-07-03 17:10:34'],
            [129, 'Anti-Ds DNA', 'Negative : Less than 16.0 U/ml Equivocal : 16.0- 24.0 U/ml Positive : Greater than 24.0 u/ml', NULL, 0, '2021-07-03 17:22:52', '2021-07-03 17:22:52'],
            [130, 'Anti Nuclear Antibody', 'Negative :Less than 1.3 Equivocal : 1.3-3.7 Positive : Greater  3.7', NULL, 0, '2021-07-03 17:23:14', '2021-07-03 17:23:14'],
            [131, 'Anti-Streptolysin O Titer', 'Negative : Less than 2 U/L Positive : Greater than 2 U/L', NULL, 0, '2021-07-03 17:23:39', '2021-07-03 17:23:39'],
            [132, 'Rheumatiod Factor', 'Negative : Less than 2 U/L Positive : Greater than 2 U/L', NULL, 0, '2021-07-03 17:23:56', '2021-07-03 17:23:56'],
            [133, 'T3', '0.80 - 1.90 ng/ml', NULL, 0, '2021-07-03 17:26:56', '2021-07-03 17:26:56'],
            [134, 'T4', '4.50 - 12.00 ug/dl', NULL, 0, '2021-07-03 17:27:08', '2021-07-03 17:27:08'],
            [135, 'TSH', '0.470 - 4.640 uIU/ml', NULL, 0, '2021-07-03 17:27:24', '2021-07-03 17:27:24'],
            [136, 'FT4', '0.470 - 4.640 uIU/ml', NULL, 0, '2021-07-03 17:27:37', '2021-07-03 17:27:37'],
            [137, 'FT3', '1.4 - 4.2 pg/mL', NULL, 0, '2021-07-03 17:27:48', '2021-07-03 17:27:48'],
            [138, 'Ferritin', 'CHILDREN:7-140 ng/ml FEMALE:18-160 MALE:18-270 NEWBORN:', NULL, 0, '2021-07-03 17:30:12', '2021-07-03 17:30:12'],
            [139, 'IRON', '60 -150 ug/dL', NULL, 0, '2021-07-03 17:30:26', '2021-07-03 17:30:26'],
            [140, 'TOTAL IRON BINDING CAPACITY(TIBC)', '250-450 ug/dL', NULL, 0, '2021-07-03 17:31:14', '2021-07-03 17:31:14'],
            [141, 'UNSATURATED IRON BINDING CAPACITY', NULL, NULL, 0, '2021-07-03 17:31:38', '2021-07-03 17:31:38'],
            [142, 'CA 125 (Ovary)', '0 - 35 u/mL', NULL, 0, '2021-07-03 17:33:15', '2021-07-03 17:33:15'],
            [143, 'CA 15-3(Breast)', '0 - 28 u/mL', NULL, 0, '2021-07-03 17:33:46', '2021-07-03 17:33:46'],
            [144, 'CA 19-9 (Pancreas)', '0 - 37 u/mL', NULL, 0, '2021-07-03 17:34:17', '2021-07-03 17:34:17'],
            [145, 'AFP (Alpha feto protein)', '0 - 2 ng/mL', NULL, 0, '2021-07-03 17:34:48', '2021-07-03 17:34:48'],
            [146, 'CEA (Carcino Embryonic Antigen)', '0 - 10 ng/L', NULL, 0, '2021-07-03 17:35:29', '2021-07-03 17:35:29'],
            [147, 'PSA (Prostatic Specific Antigen)', '0 - 4 ng/mL', NULL, 0, '2021-07-03 17:36:05', '2021-07-03 17:36:05']
        ];

        $data = [];
        foreach ($exam_types as $item) {
            $data[] = [
                'description' => $item[1],
                'normal_values' => $item[2],
                'choices' => $item[3],
                'type' => $item[4],
            ];
        }

        return $data;
    }

    private function getExams() {
        // [`id`, `user_id`, `name`, `description`, `exam_category_id`, `price`, `created_at`, `updated_at`, `exam_type_ids`]

        $exams = [
            [1, NULL, 'BLOOD CHEMISTRY', NULL, NULL, NULL, '2021-07-03 12:53:28', '2021-07-04 04:57:09', '2,3,1'],
            [2, NULL, 'BLOOD CHEMISTRY EXECUTIVE', NULL, NULL, NULL, '2021-07-03 13:21:28', '2021-07-04 05:00:20', '21,5,6,7,8,10,11,12,13,14,15,16,17,18,19,20'],
            [3, NULL, 'BLOOD CHEMISTRY FULL', NULL, NULL, NULL, '2021-07-03 13:26:57', '2021-07-03 13:30:58', '2,4,21,5,7,8,3,10,11,12,13,14,15,16,17,18,19,20,22,24,23,25'],
            [4, NULL, 'BLOOD CHEMISTRY STANDARD', NULL, NULL, NULL, '2021-07-03 13:36:08', '2021-07-03 13:36:08', '8,18,19,10,11,20,7,21,15,16,9'],
            [5, NULL, 'BLOOD TYPING', NULL, NULL, NULL, '2021-07-03 13:54:55', '2021-07-03 13:54:55', '27,26'],
            [6, NULL, 'CARDIAC MARKERS', NULL, NULL, NULL, '2021-07-03 14:01:30', '2021-07-03 14:01:30', '28,29,30,31,32'],
            [7, NULL, 'COMPLETE HEPATITIS PROFILE', NULL, NULL, NULL, '2021-07-03 14:51:10', '2021-07-03 14:51:10', '33,34,35,36,37,38,39,40,41'],
            [8, NULL, 'ELECTROLYTES', NULL, NULL, NULL, '2021-07-03 14:58:23', '2021-07-03 14:58:23', '17,14,5,6,12,42,43'],
            [9, NULL, 'ENZYME TEST', NULL, NULL, NULL, '2021-07-03 15:06:37', '2021-07-03 15:06:37', '44,45,46,47,48,49,16,51,52'],
            [10, NULL, 'FECALYSIS', NULL, NULL, NULL, '2021-07-03 15:24:44', '2021-07-03 15:26:04', '53,55,69,70,60,61,65,68,56,54,63,64,57,62,59,58,67,66,71'],
            [11, NULL, 'CBC', NULL, NULL, NULL, '2021-07-03 15:35:32', '2021-07-03 15:38:44', '80,79,73,72,77,78,81,75,76,74'],
            [12, NULL, 'Urinalysis', NULL, NULL, NULL, '2021-07-03 15:52:21', '2021-07-03 15:55:12', '84,93,91,94,81,92,85,87,90,86,88,83,89'],
            [13, NULL, 'Fecalysis', NULL, NULL, NULL, '2021-07-03 15:57:55', '2021-07-03 15:57:55', '69,70,95,81'],
            [14, NULL, 'Pregnancy Test', NULL, NULL, NULL, '2021-07-03 16:09:37', '2021-07-03 16:09:37', '96'],
            [15, NULL, 'Hepa B', NULL, NULL, NULL, '2021-07-03 16:12:07', '2021-07-03 16:12:07', '97'],
            [16, NULL, 'Others', NULL, NULL, NULL, '2021-07-03 16:13:29', '2021-07-03 16:13:29', '92'],
            [17, NULL, 'Serology', NULL, NULL, NULL, '2021-07-03 16:21:19', '2021-07-03 16:21:19', '26,27,100,98,99,81'],
            [18, NULL, 'HEMATOLOGY', NULL, NULL, NULL, '2021-07-03 16:28:02', '2021-07-03 16:34:03', '80,104,26,105,79,102,73,72,77,103,78,75,90,101,27,76,82,74'],
            [19, NULL, 'HEPATITIS PROFILE', NULL, NULL, NULL, '2021-07-03 16:48:10', '2021-07-03 16:50:10', '111,116,114,115,107,108,113,112,36,33,106'],
            [20, NULL, 'Hormones', NULL, NULL, NULL, '2021-07-03 16:56:23', '2021-07-03 16:56:23', '117,118,119,120,121,122'],
            [21, NULL, 'Liver Profile', NULL, NULL, NULL, '2021-07-03 17:07:30', '2021-07-03 17:07:30', '15,16,23,123,24,52,45'],
            [22, NULL, 'Measurements', NULL, NULL, NULL, '2021-07-03 17:13:15', '2021-07-03 17:13:15', '124,125,127,126'],
            [23, NULL, 'Serology test for SLE', NULL, NULL, NULL, '2021-07-03 17:25:51', '2021-07-03 17:25:51', '129,130,131,132,32,102'],
            [24, NULL, 'Thyroid Profile', NULL, NULL, NULL, '2021-07-03 17:28:37', '2021-07-03 17:28:37', '133,137,136,134,135'],
            [25, NULL, 'TIBC and Ferritin', NULL, NULL, NULL, '2021-07-03 17:32:24', '2021-07-03 17:32:24', '138,139,140,141'],
            [26, NULL, 'Tumor Markers', NULL, NULL, NULL, '2021-07-03 17:37:39', '2021-07-03 17:37:39', '142,143,144,145,146,147']
        ];

        $data = [];
        foreach ($exams as $item) {
            $data[] = [
                'name' => $item[2],
                'description' => $item[3],
                'exam_type_ids' => $item[8]
            ];
        }
        
        return $data;
    }

    private function getPackages() {
        // [`id`, `user_id`, `name`, `description`, `price`, `discount`, `discount_type`, `created_at`, `updated_at`)

        $packages = [
            [1, NULL, 'GENERAL RESULT BASIC 3', NULL, '0.00', NULL, NULL, '2021-07-03 16:04:40', '2021-07-03 16:04:40'],
            [2, NULL, 'GENERAL RESULT W/ PREGNANCY TEST', NULL, '0.00', NULL, 0, '2021-07-03 16:11:13', '2021-07-03 16:12:24'],
            [3, NULL, 'GENERAL RESULT WITH BLOOD TYPING', NULL, '0.00', NULL, NULL, '2021-07-03 16:17:07', '2021-07-03 16:17:07'],
            [4, NULL, 'GENERAL RESULT W/ SEROLOGY', NULL, '0.00', NULL, NULL, '2021-07-03 16:22:12', '2021-07-03 16:22:12'],
            [5, NULL, 'HEALTH CARD', NULL, '0.00', NULL, NULL, '2021-07-03 16:24:27', '2021-07-03 16:24:27'],
            [6, NULL, 'PNTC', NULL, '0.00', NULL, NULL, '2021-07-03 17:18:32', '2021-07-03 17:18:32']
        ];

        $data = [];
        foreach ($packages as $item) {
            $data[] = [
                'name' => $item[2],
                'description' => $item[3]
            ];
        }
        
        return $data;
    }

    private function getPackageExams() {
        // [`id`, `user_id`, `package_id`, `exam_id`, `created_at`, `updated_at`],

        $package_exams = [
            [1, 1, 1, 11, NULL, NULL],
            [2, 1, 1, 12, NULL, NULL],
            [3, 1, 1, 13, NULL, NULL],
            [19, 1, 2, 5, NULL, NULL],
            [20, 1, 2, 11, NULL, NULL],
            [21, 1, 2, 15, NULL, NULL],
            [22, 1, 2, 16, NULL, NULL],
            [23, 1, 2, 14, NULL, NULL],
            [24, 1, 2, 12, NULL, NULL],
            [25, 1, 3, 11, NULL, NULL],
            [26, 1, 3, 5, NULL, NULL],
            [27, 1, 3, 12, NULL, NULL],
            [28, 1, 3, 13, NULL, NULL],
            [29, 1, 4, 11, NULL, NULL],
            [30, 1, 4, 17, NULL, NULL],
            [31, 1, 4, 12, NULL, NULL],
            [32, 1, 4, 13, NULL, NULL],
            [33, 1, 5, 12, NULL, NULL],
            [34, 1, 5, 13, NULL, NULL],
            [35, 1, 6, 11, NULL, NULL],
            [36, 1, 6, 17, NULL, NULL],
            [37, 1, 6, 12, NULL, NULL],
            [38, 1, 6, 13, NULL, NULL]
        ];

        $data = [];
        foreach ($package_exams as $item) {
            $data[] = [
                'user_id' => $item[1],
                'package_id' => $item[2],
                'exam_id' => $item[3]
            ];
        }
        
        return $data;
    }
}
