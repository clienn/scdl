@extends('layouts.base')

@section('db-content')
<div class="db-content-info d-flex justify-content-md-center align-items-center h-100 mt-5 mb-5">
    <div class="container font-regular">
        <div class="row">
            <div class="col-md-12 flex-column d-flex align-items-center">
                @include('svg.search-default')
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 flex-column d-flex align-items-center mt-2">
                <span class="font-50">Results Page</span>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 flex-column d-flex align-items-center mt-1 text-center">
                <span class="font-16">Will display patient examinations and management of data.</span>
            </div>
        </div>
        <div class="row mt-3">
            <div class="col-md-12 flex-column d-flex align-items-center mt-1 text-center font-8">
                <button type="button" class="btn form-btn-2 bg-lime-1" data-toggle="modal" data-target="#bloodChemExecutiveModal">
                    <span class="font-15">Blood Chem Executive</span>
                </button>  

                <button type="button" class="btn form-btn-2 bg-lime-1 mt-2" data-toggle="modal" data-target="#bloodChemFullModal">
                    <span class="font-15">Blood Chem Full</span>
                </button> 

                <button type="button" class="btn form-btn-2 bg-lime-1 mt-2" data-toggle="modal" data-target="#bloodChemStandardModal">
                    <span class="font-15">Blood Chem Standard</span>
                </button> 

                <button type="button" class="btn form-btn-2 bg-lime-1 mt-2" data-toggle="modal" data-target="#bloodChemModal">
                    <span class="font-15">Blood Chem</span>
                </button> 
                
                <button type="button" class="btn form-btn-2 bg-lime-1 mt-2" data-toggle="modal" data-target="#tibcFerritinModal">
                    <span class="font-15">TIBC and Ferritin</span>
                </button> 
            </div>
        </div>
    </div>
</div>

@include('modals.blood-chem-executive')
@include('modals.blood-chem-full')
@include('modals.blood-chem-standard')
@include('modals.blood-chem')
@include('modals.tibc-ferritin')

@stop