@extends('layouts.base')

@section('db-content')
<div class="d-flex justify-content-md-center align-items-center h-100 mt-5 mb-5">
    <div class="container-fluid font-regular form-wrap">
        <div class="row">
            <div class="col-md-10 flex-column d-flex">
                <h1 class="font-regular font-40">Company Registration</h1>
            </div>
            <div class="col-md-2 flex-column d-flex pull-right">
                <h1 class="font-regular font-16 text-right"><a href="/company/list">View Table</a></h1>
            </div>
        </div>

        <form method="post" action="/company/save">
            {{ csrf_field() }}
            <input type="hidden" name="id" value="{{ count($company) ? $company[0]->id : 0 }}" />
            <input type="hidden" name="_method" value="{{ count($company) ? 'PUT' : 'POST' }}">
            <!-- General Info -->
            <div class="row mt-5">
                <div class="col-md-12 flex-column d-flex font-20">
                    <span>General Info</span>
                </div>

                <div class="col-md-12 flex-column d-flex">
                    <div class="container-fluid">
                        <div class="row mt-4">
                            <div class="col-md-4">
                                <input type="text" name="name" class="form-control-1 form-rounded form-input-1 font-16" placeholder="Company Name" value="{{ count($company) ? $company[0]->name : '' }}">
                            </div>
                            <div class="col-md-4">
                                <input type="text" name="address" class="form-control-1 form-rounded form-input-1 font-16" placeholder="address" value="{{ count($company) ? $company[0]->address : '' }}">
                            </div>
                        </div>
                        <div class="row mt-4">
                            <div class="col-md-4">
                                <input type="text" name="contact_person" class="form-control-1 form-rounded form-input-1 font-16" placeholder="Contact Person" value="{{ count($company) ? $company[0]->contact_person : '' }}">
                            </div>
                            <div class="col-md-4">
                                <input type="text" name="tin" class="form-control-1 form-rounded form-input-1 font-16" placeholder="TIN" value="{{ count($company) ? $company[0]->tin : '' }}">
                            </div>
                        </div>
                        <div class="row mt-4">
                            <div class="col-md-4">
                                <input type="text" name="fax" class="form-control-1 form-rounded form-input-1 font-16" placeholder="Fax" value="{{ count($company) ? $company[0]->fax : '' }}">
                            </div>
                            <div class="col-md-4">
                                <input type="text" name="contact" class="form-control-1 form-rounded form-input-1 font-16" placeholder="Contact No." value="{{ count($company) ? $company[0]->contact : '' }}">
                            </div>
                        </div>
                        <div class="row mt-4">
                            <div class="col-md-4">
                                <select name="status" class="form-control-1 form-rounded form-select-1 font-16">
                                    <option hidden>Status</option>
                                    <option value="Affiliated">Affiliated</option>
                                    <option value="2">Not Affiliated</option>
                                </select>
                            </div>
                            <div class="form-group col-md-3">
                                <button type="button" class="btn form-btn-2 bg-lime-1" data-toggle="modal" data-target="#packageModal">
                                    <span class="svg-plus">@include('svg.plus')</span>
                                    <span class="font-15">Assign Package</span>
                                </button>    
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <table id="package-list" class="table tb-style-1 table-hover mt-5">
                <thead>
                    <tr class="font-lime font-bold">
                        <th scope="col">&nbsp;</th>
                        <th scope="col">Name</th>
                        <th scope="col">Discount Type</th>
                        <th scope="col">Discount</th>
                        <th scope="col">Price</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody class="font-10">
                    @foreach($packages as $package)
                    <tr>
                        <td scope="row" style="width:10%;"><input type="checkbox" name="packages[]" value="{{ $package->id }}" checked /></td>
                        <td>{{ $package->name }}</td>
                        <td>{{ $package->discount_type }}</td>
                        <td>{{ $package->discount }}</td>
                        <td>{{ $package->price }}</td>
                        <td>...</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>

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

@include('modals.package-list')

<script type="text/javascript" src="{{asset('js/main.js')}}"></script>
<script type="text/javascript">
    $(document).ready(function() {
        initAddItems('package-list', 'package-list-modal', 'packageModal', 'package-list-pagination', 
            '/company/package/list', "{{ URL::to('/') }}", checkSelectedExams, null);
    });
</script>

@stop