<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('layouts.login');
})->name('login');



// Route::get('/patient', 'UserController@getAll');
Route::post('/auth', 'LoginController@authenticate');


Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', function () {
        return view('layouts.dashboard');
    });

    // Route::get('/results', function () {
    //     return view('layouts.results');
    // });

    Route::get('/results', 'ResultController@index');
    Route::get('/patient/{id}/results', 'ResultController@getPatientResults');
    Route::get('/result/list', 'ResultController@list');
    Route::post('/result/save', 'ResultController@store');

    Route::get('/user/{id}/registration', 'UserController@registration');
    Route::get('/user/list', 'UserController@index');
    Route::get('/user/list/search', 'UserController@getUserList');

    Route::get('/patient/{id}/registration', 'PatientController@registration');
    Route::get('/patient/list', 'PatientController@index');
    Route::get('/patient/list/search', 'PatientController@getPatientList');
    
    Route::get('/company/{id}/registration', 'CompanyController@registration');
    Route::get('/company/list', 'CompanyController@index');
    Route::get('/company/package/list', 'CompanyController@getPackageList');
    Route::get('/company/list/search', 'CompanyController@getCompanyList');

    Route::get('/cashiering', 'CashieringController@index');

    Route::get('/exam/{id}/registration', 'ExamController@registration');
    Route::get('/exam/list', 'ExamController@index');
    Route::get('/exam_type/list', 'ExamController@examType');
    Route::get('/exam_type/list/search', 'ExamController@getExamTypes');
    Route::get('/exam_type/{id}/registration', 'ExamController@examTypeRegistration');
    Route::get('/exam/type/list', 'ExamController@getExamTypeList');
    Route::get('/exam/type/search', 'ExamController@searchExamType');

    Route::get('/package/{id}/registration', 'PackageController@registration');
    Route::get('/package/list', 'PackageController@index');
    Route::get('/package/exam/list', 'PackageController@getExamList');

    Route::get('/cashiering/patient/list', 'CashieringController@getPatientList');
    Route::get('/cashiering/package/exam/list', 'CashieringController@getCashieringExamLists');
    Route::get('/cashiering/package/list', 'CashieringController@getCashieringPackageLists');
    Route::get('/cashiering/package/info', 'CashieringController@getPackageInfo');

    Route::post('/cashiering/patient/save', 'CashieringController@cashieringPatientSave');
    Route::post('/cashiering/save', 'CashieringController@store');

    Route::get('/doctor/form/{id}/{fid}', 'DoctorController@index');
    Route::post('/doctor/form/save', 'DoctorController@store');
    Route::put('/doctor/form/save', 'DoctorController@store');

    Route::post('/patient/save', 'PatientController@store');
    Route::put('/patient/save', 'PatientController@store');

    Route::post('/company/save', 'CompanyController@store');
    Route::put('/company/save', 'CompanyController@store');

    Route::post('/user/save', 'UserController@store');
    Route::put('/user/save', 'UserController@store');

    Route::post('/exam/save', 'ExamController@store');
    Route::put('/exam/save', 'ExamController@store');

    Route::post('/exam_type/save', 'ExamController@storeExamType');
    Route::put('/exam_type/save', 'ExamController@storeExamType');
    Route::get('/exam_type/{id}/delete', 'ExamController@delete');

    Route::post('/package/save', 'PackageController@store');
    Route::put('/package/save', 'PackageController@store');

    Route::get('/test/form', 'ResultController@getForm');
    Route::get('/test', 'ResultController@test');
});
