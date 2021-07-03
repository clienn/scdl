@extends('layouts.base')

@section('search-bar')
    @include('partials.search-bar')
@stop

@section('db-content')
<div class="d-flex justify-content-md-center align-items-center h-100 mt-5 mb-5">
    <div class="container-fluid font-regular form-wrap">
        <div class="row">
            <div class="col-md-10 flex-column d-flex">
                <h1 class="font-regular font-40">Doctors Form</h1>
            </div>
            <div class="col-md-2 flex-column d-flex pull-right">
                <h1 class="font-regular font-16 text-right"><a href="#" data-toggle="modal" data-target="#patient-search-modal">Find Patient</a></h1>
            </div>
        </div>

        <form method="POST" action="/doctor/form/save" id="doctor-form-submit">
            {{ csrf_field() }}
            <input type="hidden" name="id" value="{{ request()->route('id') }}" />
            <input type="hidden" name="fid" value="{{ request()->route('fid') }}" />
            <input type="hidden" name="_method" value="{{ request()->route('fid') ? 'PUT' : 'POST' }}">
            <input type="hidden" name="medical_history" value="{{ count($doctor_form) ? $doctor_form[0]->medical_history : '' }}">
            <input type="hidden" name="body_system" value="{{ count($doctor_form) ? $doctor_form[0]->body_system : '' }}">
            <input type="hidden" name="dental" value="{{ count($doctor_form) ? $doctor_form[0]->dental : '' }}">
            <!-- General Info -->
            <div class="row mt-5">
                <div class="col-md-12 flex-column d-flex font-20">
                    <span>General Info</span>
                </div>

                <div class="col-md-12 flex-column d-flex">
                    <div class="container-fluid">
                        <div class="row mt-4">
                            <div class="col-md-4">
                                <input type="text" name="lastname" class="form-control-1 form-rounded form-input-1 font-16" placeholder="Lastname" value="{{ $patient[0]->lastname }}">
                            </div>
                            <div class="col-md-4">
                                <input type="text" name="firstname" class="form-control-1 form-rounded form-input-1 font-16" placeholder="Firstname" value="{{ $patient[0]->firstname }}">
                            </div>
                            <div class="col-md-3">
                                <input type="text" name="middlename" class="form-control-1 form-rounded form-input-1 font-16" placeholder="Middlename" value="{{ $patient[0]->middlename }}">
                            </div>
                        </div>
                        <div class="row mt-4">
                            <div class="col-md-4">
                                <select name="gender" class="form-control-1 form-rounded form-select-1 font-16">
                                    <option hidden><span class="font-gray-3">Select Gender</span></option>
                                    <option value="male" {{ $patient[0]->gender == 'male' ? 'selected' : '' }}>Male</option>
                                    <option value="female" {{ $patient[0]->gender == 'female' ? 'selected' : '' }}>Female</option>
                                </select>    
                            </div>
                            <div class="col-md-4">
                                <input type="text" name="birthdate" class="form-control-1 form-rounded form-input-1 font-16" placeholder="Date of Birth" value="{{ $patient[0]->birthdate }}">
                            </div>
                            <div class="col-md-3">
                                <input type="text" name="age" class="form-control-1 form-rounded form-input-1 font-16" placeholder="Age" value="{{ floor((strtotime(date('Y-m-d')) - strtotime($patient[0]->birthdate)) / 31536000) }}">
                            </div>
                        </div>
                        <div class="row mt-4">
                            <div class="col-md-4">
                                <input type="text" name="birthplace" class="form-control-1 form-rounded form-input-1 font-16" placeholder="Birth Place" value="">
                            </div>
                            <div class="col-md-4">
                                <input type="text" name="address" class="form-control-1 form-rounded form-input-1 font-16" placeholder="Address" value="{{ $patient[0]->address1 }}">
                            </div>
                            <div class="col-md-3">
                                <input type="text" name="contact" class="form-control-1 form-rounded form-input-1 font-16" placeholder="Contact No." value="{{ $patient[0]->mobile }}">
                            </div>
                        </div>
                        <div class="row mt-4">
                            <div class="col-md-3">
                                <select name="civil_status" class="form-control-1 form-rounded form-select-1 font-16">
                                    <option hidden><span class="font-gray-3">Civil Status</span></option>
                                    <option value="single">Single</option>
                                    <option value="married">Married</option>
                                </select>    
                            </div>
                            <div class="col-md-2">
                                <select name="blood_type" class="form-control-1 form-rounded form-select-1 font-16">
                                    <option hidden><span class="font-gray-3">Blood Type</span></option>
                                    <option value="o">O</option>
                                    <option value="a">A</option>
                                </select>     
                            </div>
                            <div class="col-md-3">
                                <input type="text" name="last_menstrual_date" autocomplete="off" class="form-control-1 form-rounded form-input-1 font-16 datepicker" placeholder="Last Menstrual Date" value="{{ count($doctor_form) ? $doctor_form[0]->last_menstrual_date : '' }}">
                            </div>
                            <div class="col-md-3">
                                <div class="row">
                                    <div class="col-sm-12"><span>Nature of Examination</span></div>
                                    <div class="col-sm-12"></div>
                                </div>
                                <div class="row">
                                    <div class="col-md-3 flex-column d-flex form-check ml-3">
                                        <input type="radio" name="nature_of_examination" class="form-check-input" value="PME" {{ count($doctor_form) && $doctor_form[0]->nature_of_examination == 'PME' ? 'checked' : '' }}>
                                        <label class="form-check-label">PME</label>
                                    </div>
                                    <div class="col-md-4 flex-column d-flex form-check">
                                        <input type="radio" name="nature_of_examination" class="form-check-input" value="APE" {{ count($doctor_form) && $doctor_form[0]->nature_of_examination == 'APE' ? 'checked' : '' }}>
                                        <label class="form-check-label">APE</label>
                                    </div>
                                </div>    
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-12 flex-column d-flex font-20 mt-5">
                    <span>Select Patient Form</span>
                </div>

                <div class="col-md-12 flex-column d-flex">
                    <div class="container-fluid">
                        <div class="row mt-4">
                            <div class="col-md-4">
                                <select name="patient_form" class="form-control-1 form-rounded form-select-1 font-16">
                                    <option value="0">New Form</option>
                                    @foreach($patient_forms as $form)
                                        <option value="{{ $form->id }}">{{ $form->created_at }}</option>
                                    @endforeach
                                </select>    
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-12 flex-column d-flex mt-5">
                    <span>Check if has suffered from or been told had any of the following:</span>
                </div>
                
                <div class="col-md-12 flex-column d-flex mt-5">
                    <div role="tabpanel">
                        <!-- Nav tabs -->
                        <ul class="nav nav-tabs">
                        <li class="nav-item">
                            <a class="nav-link active" href="#medicalHistoryTab" aria-controls="medicalHistoryTab" role="tab" data-toggle="tab">I. Medical History</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#physicalExaminationTab" aria-controls="physicalExaminationTab" role="tab" data-toggle="tab">II. Physical Examination</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#examinationReportTab" aria-controls="examinationReportTab" role="tab" data-toggle="tab">III. X-Ray, ECG and Laboratory Examination Report</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#evaluationReportTab" aria-controls="evaluationReportTab" role="tab" data-toggle="tab">Medical Evaluation</a>
                        </li>
                        </ul>
                        <!-- Tab panes -->
                        <div class="tab-content">
                            <div role="tabpanel" class="tab-pane active font-bold font-10" id="medicalHistoryTab">
                                <div class="container-fluid">
                                    @include('partials.doctors_form.medical-history')
                                </div>
                            </div>
                            <div role="tabpanel" class="tab-pane" id="physicalExaminationTab">
                                @include('partials.doctors_form.physical-examination')
                            </div>
                            <div role="tabpanel" class="tab-pane" id="examinationReportTab">
                                @include('partials.doctors_form.lab-exam-report')
                            </div>
                            <div role="tabpanel" class="tab-pane" id="evaluationReportTab">
                                @include('partials.doctors_form.medical-evaluation')
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-12 flex-column d-flex font-20 mt-5 hr-dashed"></div>
            
            <div class="col-md-12 flex-column d-flex font-20 mt-5">
                <span>Medical Evaluation</span>
            </div>
            <div class="row mt-4 font-10 font-bold">
                <div class="col-md-2 flex-column d-flex form-check ml-4">
                    <input type="radio" name="medical_evaluation" class="form-check-input" value="1" {{ count($doctor_form) && $doctor_form[0]->medical_evaluation == 1 ? 'checked' : '' }}>
                    <label class="form-check-label">FIT TO WORK AT THE TIME OF EXAMINATION</label>
                </div>
                <div class="col-md-3 flex-column d-flex form-check">
                    <input type="radio" name="medical_evaluation" class="form-check-input" value="2" {{ count($doctor_form) && $doctor_form[0]->medical_evaluation == 2 ? 'checked' : '' }}>
                    <label class="form-check-label">FIT TO WORK BUT WITH CORRECTIBLE DEFECTS</label>
                </div>
                <div class="col-md-3 flex-column d-flex form-check">
                    <input type="radio" name="medical_evaluation" class="form-check-input" value="4" {{ count($doctor_form) && $doctor_form[0]->medical_evaluation == 4 ? 'checked' : '' }}>
                    <label class="form-check-label">EMPLOYABLE BUT W/ IMPAIRMENTS OR CONDITIONS THAT REQUIRES SPECIAL PLACEMENTS ON DUTY</label>
                </div>
                <div class="col-md-3 flex-column d-flex form-check">
                    <input type="radio" name="medical_evaluation" class="form-check-input" value="8" {{ count($doctor_form) && $doctor_form[0]->medical_evaluation == 8 ? 'checked' : '' }}>
                    <label class="form-check-label">MEDICALLY UNFIT FOR EMPLOYMENT</label>
                </div>
            </div>

            <div class="col-md-12 flex-column d-flex font-20 mt-5">
                <span>Decision/Recommendation</span>
            </div>
            <div class="row mt-4">
                <div class="col-md-11">
                    <textarea class="form-control" name="recommendations" rows="3">{{ count($doctor_form) ? $doctor_form[0]->recommendations : '' }}</textarea>
                </div>
            </div>

            <div class="row mt-5">
                <div class="col-md-12 flex-column d-flex">
                    <input type="checkbox" name="certified" class="agreement-check" value="1" {{ count($doctor_form) && $doctor_form[0]->certified ? 'checked' : '' }}/>
                    <span class="agreement-text">I certify that the above information is complete and true. I understand that inaccurate, false or missing information may invalidate the examination and my Medical Examiner’s Certificate and may disqualify me from my employments' benefit or claims.</span>
                </div>
            </div>

            <div class="row mt-5">
                <div class="col-md-9 flex-column d-flex">
                    <span>Date: {{ date('Y-m-d') }}</span>    
                </div>
                <div class="col-md-3 flex-column d-flex">
                    <div class="row">
                        <div class="col-md-12 flex-column d-flex border-bottom-1"></div>
                        <div class="col-md-12 flex-column d-flex text-center">
                            <span>Signature over printed name</span> 
                        </div> 
                    </div>
                </div>
            </div>

            @include('partials.saveinfo')

            
        </form>
    </div>
</div>

@include('modals.search-patient')

<script type="text/javascript" src="{{asset('js/main.js')}}"></script>
<script type="text/javascript">
    $(document).ready(function() {
        // $('input[name="mh"]').click(function() {
        //     $('input[name="mh"]').each(function(i) {
        //         console.log(i, $(this).is(':checked'));
        //     });
        // });
        initAjaxPagination('patient-list-pagination', 'search-patient-modal', "{{ URL::to('/') }}", '/cashiering/patient/list', 'patient-search');

        fillCheckOptions();

        $('#doctor-form-submit').submit(function() {
            checkedOptions2Hex('mh', 'medical_history');
            checkedOptions2Hex('body_system', 'body_system');
            checkedOptions2Hex('dental', 'dental');
        });

        $('select[name="patient_form"]').change(function() {
            let url = '/doctor/form/' + {{ request()->route('id') }} + '/' + $(this).val();
            location.href = url;
        });

        $(document).on('click', '#search-patient-modal table tbody tr', function() {
            $('.table-hover tbody tr').removeClass('selected');
            $(this).addClass('selected');
        });

        $('#btn-confirm_patient_selection').click(function() {
            let id = $('.table-hover tbody tr.selected td:eq(0)').html();
            let url = '/doctor/form/' + id + '/0';
            location.href = url;
        });
    });

    function fillCheckOptions() {
        let mh = $('input[name="medical_history"]').val();
        let body_system = $('input[name="body_system"]').val();
        let dental = $('input[name="dental"]').val();

        if (mh) checkOptions('mh', mh);
        if (body_system) checkOptions('body_system', body_system);
        if (dental) checkOptions('dental', dental);
    }

    function checkOptions(class_id, hex) {
        $('.' + class_id).each(function(i) {
            let b = Math.pow(2, i % 4);
            let p = Math.floor(i / 4);
            let c = hex.charAt(p);
            let n = parseInt(c, 16);

            if (b & n) {
                $(this).attr('checked', true);
            }
        });
    }

    function checkedOptions2Hex(class_id, input_name) {
        let n = 0;
        let h = '';
        
        $('.' + class_id).each(function(i) {
            let b = i % 4;

            if (i && b == 0) {
                h += n.toString(16);
                n = 0;
            }

            if ($(this).is(':checked')) {
                n += Math.pow(2, b);
            }
        });

        h += n.toString(16);

        $('input[name="' + input_name + '"]').val(h);
    }
</script>
@stop