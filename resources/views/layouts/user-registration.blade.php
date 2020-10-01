@extends('layouts.base')

@section('db-content')
<div class="d-flex justify-content-md-center align-items-center h-100 mt-5 mb-5">
    <div class="container-fluid font-regular form-wrap">
        <div class="row">
            <div class="col-md-10 flex-column d-flex">
                <h1 class="font-regular font-40">User Registration</h1>
            </div>
            <div class="col-md-2 flex-column d-flex pull-right">
                <h1 class="font-regular font-16 text-right"><a href="/user/list">View Table</a></h1>
            </div>
        </div>

        <form method="post" action="/user/save">
            {{ csrf_field() }}
            <input type="hidden" name="id" value="{{ count($user) ? $user[0]->id : 0 }}" />
            <input type="hidden" name="_method" value="{{ count($user) ? 'PUT' : 'POST' }}">
            <!-- General Info -->
            <div class="row mt-5">
                <div class="col-md-12 flex-column d-flex">
                    <div class="container-fluid">
                        <div class="row mt-4">
                            <div class="col-md-3">
                                <input type="text" name="lastname" class="form-control-1 form-rounded form-input-1 font-16" placeholder="Lastname" value="{{ count($user) ? $user[0]->lastname : '' }}">
                            </div>
                            <div class="col-md-3">
                                <input type="text" name="firstname" class="form-control-1 form-rounded form-input-1 font-16" placeholder="Firstname" value="{{ count($user) ? $user[0]->firstname : '' }}">
                            </div>
                            <div class="col-md-3">
                                <input type="text" name="middlename" class="form-control-1 form-rounded form-input-1 font-16" placeholder="Middlename" value="{{ count($user) ? $user[0]->middlename : '' }}">
                            </div>
                        </div>
                        <div class="row mt-4">
                            <div class="col-md-3">
                                <input type="text" name="username" class="form-control-1 form-rounded form-input-1 font-16" placeholder="Username" value="{{ count($user) ? $user[0]->username : '' }}">
                            </div>
                            <div class="col-md-3">
                                <input type="text" name="email" class="form-control-1 form-rounded form-input-1 font-16" placeholder="Email" value="{{ count($user) ? $user[0]->email : '' }}">
                            </div>
                            <div class="col-md-3">
                                <input type="password" name="password" class="form-control-1 form-rounded form-input-1 font-16" placeholder="Password">
                            </div>
                        </div>
                        <div class="row mt-5"></div>
                        <div class="row mt-4 font-20">
                            <div class="col-md-3">
                                <span>Roles</span>
                            </div>
                            <div class="col-md-3 ml-3">
                                <span>Privileges</span>
                            </div>
                        </div>

                        <div class="row mt-4">
                            <div class="col-md-3">
                                <select name="role" class="form-control-1 form-rounded form-select-1 font-16">
                                    <option hidden>Roles</option>
                                    <option value="1">Super Admin</option>
                                    <option value="1">Medical Technologist</option>
                                    <option value="2">Physician / Doctor</option>
                                    <option value="3">Rad Tech</option>
                                    <option value="3">Sonologist</option>
                                    <option value="3">Radiologist</option>
                                    <option value="3">Encoder</option>
                                    <option value="3">Cashier</option>
                                    <option value="3">Accounting</option>
                                    <option value="3">Receptionist</option>
                                    <option value="3">Medical Secretary</option>
                                    <option value="3">Psychometrician</option>
                                    <option value="3">Dentist</option>
                                </select>
                            </div>
                            <div class="col-md-9">
                                <div class="col-sm-12 h-100 d-table font-14">
                                    <div class="card card-block d-table-cell align-middle no-border">
                                         <div class="form-check form-check-inline">
                                            <input class="form-check-input checkbox-1" type="checkbox" name="chk-privilege[]" value="1" {{ count($user) && ($user[0]->privileges & 1) ? 'checked' : '' }}>
                                            <label class="form-check-label" for="inlineCheckbox1">Can Open</label>
                                        </div>
                                        <div class="form-check form-check-inline ml-4">
                                            <input class="form-check-input checkbox-1" type="checkbox" name="chk-privilege[]" value="2" {{ count($user) && ($user[0]->privileges & 2) ? 'checked' : '' }}>
                                            <label class="form-check-label" for="inlineCheckbox2">Can Add</label>
                                        </div>
                                        <div class="form-check form-check-inline ml-4">
                                            <input class="form-check-input checkbox-1" type="checkbox" name="chk-privilege[]" value="4" {{ count($user) && ($user[0]->privileges & 4) ? 'checked' : '' }}>
                                            <label class="form-check-label" for="inlineCheckbox3">Can Edit</label>
                                        </div>
                                        <div class="form-check form-check-inline ml-4">
                                            <input class="form-check-input checkbox-1" type="checkbox" name="chk-privilege[]" value="8" {{ count($user) && ($user[0]->privileges & 8) ? 'checked' : '' }}>
                                            <label class="form-check-label" for="inlineCheckbox3">Can Delete</label>
                                        </div>
                                        <div class="form-check form-check-inline ml-4">
                                            <input class="form-check-input checkbox-1" type="checkbox" name="chk-privilege[]" value="16" {{ count($user) && ($user[0]->privileges & 16) ? 'checked' : '' }}>
                                            <label class="form-check-label" for="inlineCheckbox3">Can Discount</label>
                                        </div>
                                    </div>
                                </div>
                                
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