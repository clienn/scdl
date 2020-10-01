@extends('layouts.base')

@section('db-content')
<div class="d-flex justify-content-md-center align-items-center h-100 mt-5 mb-5">
    <div class="container-fluid font-regular form-wrap">
        <div class="row">
            <div class="col-md-10 flex-column d-flex">
                <h1 class="font-regular font-40">Patient Registration {{ count($patient) ? $patient[0]->id : "" }}</h1>
            </div>
            <div class="col-md-2 flex-column d-flex pull-right">
                <h1 class="font-regular font-16 text-right"><a href="/patient/list">View Table</a></h1>
            </div>
        </div>
        <div class="row mt-5">
            <div class="col-md-12 flex-column d-flex font-20">
                <span>Patient Code: <span class="font-bold font-lime">0924342422092434</span></span>
            </div>
        </div>

        <form method="post" action="/patient/save">
            {{ csrf_field() }}
            <input type="hidden" name="id" value="{{ count($patient) ? $patient[0]->id : 0 }}" />
            <input type="hidden" name="_method" value="{{ count($patient) ? 'PUT' : 'POST' }}">
            <!-- General Info -->
            <div class="row mt-5">
                <div class="col-md-12 flex-column d-flex font-20">
                    <span>General Info</span>
                </div>

                <div class="col-md-12 flex-column d-flex">
                    <div class="container-fluid">
                        <div class="row mt-4">
                            <div class="col-md-4">
                                <input type="text" name="lastname" class="form-control-1 form-rounded form-input-1 font-16" id="in-lastname" placeholder="Last Name" value="{{ count($patient) ? $patient[0]->lastname : '' }}">
                            </div>
                            <div class="col-md-4">
                                <input type="text" name="firstname" class="form-control-1 form-rounded form-input-1 font-16" id="in-firstname" placeholder="First Name" value="{{ count($patient) ? $patient[0]->firstname : '' }}">
                            </div>
                            <div class="col-md-2">
                                <input type="text" name="middlename" class="form-control-1 form-rounded form-input-1 font-16" id="in-middlename" placeholder="Middle Name" value="{{ count($patient) ? $patient[0]->middlename : '' }}">
                            </div>
                        </div>
                        <div class="row mt-4">
                            <div class="col-md-4">
                                <!-- <input type="text" class="form-control-1 form-rounded form-input-1 font-16" id="in-company" placeholder="Company"> -->
                                <select name="company_id" class="form-control-1 form-rounded form-select-1 font-16">
                                    <option hidden><span class="font-gray-3">Company / Institution</span></option>
                                    <option value="0">No Company</option>
                                    @foreach($data as $company)
                                        <option value="{{ $company->id }}" {{ count($patient) && $patient[0]->company_id == $company->id ? 'selected' : ''}}>{{ $company->name }}</option>
                                    @endforeach
                                </select>
                                
                            </div>
                            <div class="col-md-4">
                                <input type="text" name="birthdate" class="form-control-1 form-rounded form-input-1 font-16 datepicker" id="in-birthdate" placeholder="Date of Birth" value="{{ count($patient) ? $patient[0]->birthdate : '' }}">
                            </div>
                            <div class="col-md-2">
                                <input type="text" name="gender" class="form-control-1 form-rounded form-input-1 font-16" id="in-gender" placeholder="Gender" value="{{ count($patient) ? $patient[0]->gender : '' }}">
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Contact Address -->
            <div class="row mt-5">
                <div class="col-md-12 flex-column d-flex font-20">
                    <span>Contact Address</span>
                </div>

                <div class="col-md-12 flex-column d-flex">
                    <div class="container-fluid">
                        <div class="row mt-4">
                            <div class="col-md-5">
                                <input type="text" name="address1" class="form-control-1 form-rounded form-input-1 font-16" id="in-address-1" placeholder="Address 1" value="{{ count($patient) ? $patient[0]->address_1 : '' }}">
                            </div>
                            <div class="col-md-5">
                                <input type="text" name="address2" class="form-control-1 form-rounded form-input-1 font-16" id="in-address-2" placeholder="Address 2" value="{{ count($patient) ? $patient[0]->address_2 : '' }}">
                            </div>
                        </div>
                        <div class="row mt-4">
                            <div class="col-md-4">
                                <input type="text" name="city" class="form-control-1 form-rounded form-input-1 font-16" id="in-city" placeholder="City" value="{{ count($patient) ? $patient[0]->city : '' }}">
                            </div>
                            <div class="col-md-2">
                                <input type="text" name="zipcode" class="form-control-1 form-rounded form-input-1 font-16" id="in-zipcode" placeholder="Zip Code" value="{{ count($patient) ? $patient[0]->zipcode : '' }}">
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Civil Status -->
             
            <div class="row mt-5">
                <div class="col-md-12 flex-column d-flex font-20">
                    <span>CIvil Status</span>
                </div>

                <div class="col-md-12 flex-column d-flex">
                    <div class="container-fluid">
                        <div class="row mt-4">
                            <div class="col-md-3">
                                <!-- <input type="text" class="form-control-1 form-rounded form-input-1 font-16" id="in-marital-status" placeholder="Marital Status"> -->
                                <select name="marital_status" class="form-control-1 form-rounded form-select-1 font-16">
                                    <option value="" selected disabled>Marital Status</option>
                                    <option value="1">MS 1</option>
                                    <option value="2">MS 2</option>
                                    <option value="3">MS 3</option>
                                </select>
                            </div>
                            <div class="col-md-3">
                                <!-- <input type="text" class="form-control-1 form-rounded form-input-1 font-16" id="in-ethnicity" placeholder="Ethnicity"> -->
                            
                                <select name="ethnicity" class="form-control-1 form-rounded form-select-1 font-16">
                                    <option value="" selected disabled>Ethnicity</option>
                                    <option value="1">Ethnicity 1</option>
                                    <option value="2">Ethnicity 2</option>
                                    <option value="3">Ethnicity 3</option>
                                </select>
                            </div>
                            <div class="col-md-4">
                                <!-- <input type="text" class="form-control-1 form-rounded form-input-1 font-16" id="in-type" placeholder="Type"> -->
                                <select name="type" class="form-control-1 form-rounded form-select-1 font-16">
                                    <option value="" selected disabled>Type</option>
                                    <option value="1">Type 1</option>
                                    <option value="2">Type 2</option>
                                    <option value="3">Type 3</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Sticker -->
            <div class="row mt-5">
                <div class="col-md-12 flex-column d-flex font-20">
                    <span>Sticker</span>
                </div>

                <div class="col-md-12 flex-column d-flex">
                    <div class="container-fluid">
                        <div class="row mt-4">
                            <div class="col-md-4">
                                <span>Sticks Per Day</span>
                            </div>
                            <div class="col-md-4">
                                <span>Alcohol Rate</span>
                            </div>
                        </div>
                        <div class="row mt-4">
                            <div class="col-md-4">
                                <input type="text" name="sticks_per_day" class="form-control-1 form-rounded form-input-1 font-16" id="in-sticks-per-day" placeholder="Sticks Per Day" value="{{ count($patient) ? $patient[0]->sticks_per_day : '' }}">
                            </div>
                            <div class="col-md-4">
                                <input type="text" name="alcohol_rate" class="form-control-1 form-rounded form-input-1 font-16" id="in-alcohol-rate" placeholder="Alcohol Rate" value="{{ count($patient) ? $patient[0]->alcohol_rate : '' }}">
                            </div>
                        </div>
                        <div class="row mt-4">
                            <div class="col-md-4">
                                <input type="text" name="email" class="form-control-1 form-rounded form-input-1 font-16" id="in-emails" placeholder="Email Address" value="{{ count($patient) ? $patient[0]->email : '' }}">
                            </div>
                            <div class="col-md-4">
                                <input type="text" name="phone" class="form-control-1 form-rounded form-input-1 font-16" id="in-telephone" placeholder="Tel No." value="{{ count($patient) ? $patient[0]->phone : '' }}">
                            </div>
                        </div>
                        <div class="row mt-4">
                            <div class="col-md-4">
                                <input type="text" name="mobile" class="form-control-1 form-rounded form-input-1 font-16" id="in-mobile" placeholder="Mobile No." value="{{ count($patient) ? $patient[0]->mobile : '' }}">
                            </div>
                            <div class="col-md-4">
                                <input type="text" name="fax" class="form-control-1 form-rounded form-input-1 font-16" id="in-fax" placeholder="Fax" value="{{ count($patient) ? $patient[0]->fax : '' }}">
                            </div>
                        </div>
                        <div class="row mt-4">
                            <div class="col-md-4">
                                <input type="text" name="sss" class="form-control-1 form-rounded form-input-1 font-16" id="in-sss" placeholder="SSS ID" value="{{ count($patient) ? $patient[0]->sss : '' }}">
                            </div>
                            <div class="col-md-4">
                                <input type="text" name="philhealth" class="form-control-1 form-rounded form-input-1 font-16" id="in-philhealth" placeholder="PhilHealth ID" value="{{ count($patient) ? $patient[0]->philhealth : '' }}">
                            </div>
                        </div>
                        <div class="row mt-4">
                            <div class="col-md-4">
                                <input type="text" name="hmo" class="form-control-1 form-rounded form-input-1 font-16" id="in-hmo" placeholder="HMO" value="{{ count($patient) ? $patient[0]->hmo : '' }}">
                            </div>
                            <div class="col-md-4">
                                <input type="text" name="hmo_no" class="form-control-1 form-rounded form-input-1 font-16" id="in-hmo-num" placeholder="HMO No." value="{{ count($patient) ? $patient[0]->hmo_no : '' }}">
                            </div>
                        </div>
                        <div class="row mt-4">
                            <div class="col-md-4">
                                <span>Date of Membership</span>
                            </div>
                            <div class="col-md-4">
                                <span>Date of Expiration</span>
                            </div>
                        </div>
                        <div class="row mt-4">
                            <div class="col-md-4">
                                <input type="text" name="membership_date" class="form-control-1 form-rounded form-input-1 font-16 datepicker" id="in-membership-date" placeholder="Date" value="{{ count($patient) ? $patient[0]->membership_date : '' }}">
                            </div>
                            <div class="col-md-4">
                                <input type="text" name="expiration_date" class="form-control-1 form-rounded form-input-1 font-16 datepicker" id="in-expiration-date" placeholder="Date" value="{{ count($patient) ? $patient[0]->expiration_date : '' }}">
                            </div>
                        </div>
                        <div class="row mt-4">
                            <div class="col-md-4">
                                <input type="text" name="status" class="form-control-1 form-rounded form-input-1 font-16" id="in-status" placeholder="Status" value="{{ count($patient) ? $patient[0]->status : '' }}">
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row mt-5">
                <div class="col-md-12 flex-column d-flex">
                    <div class="container-fluid font-14">
                        <div class="row mt-4">
                            <div class="col-md-2">
                                <span>Date Added:</span>
                            </div>
                            <div class="col-md-4">
                                <span>--------------------</span>
                            </div>
                            <div class="col-md-2">
                                <span>Added By:</span>
                            </div>
                            <div class="col-md-4">
                                <span>--------------------</span>
                            </div>
                        </div>
                        <div class="row mt-4">
                            <div class="col-md-2">
                                <span>Date Updated:</span>
                            </div>
                            <div class="col-md-4">
                                <span>--------------------</span>
                            </div>
                            <div class="col-md-2">
                                <span>Updated By:</span>
                            </div>
                            <div class="col-md-4">
                                <span>--------------------</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            @include('partials.saveinfo')

            
        </form>
    </div>
</div>
@stop