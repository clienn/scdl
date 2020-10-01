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
                <span class="font-50">Welcome back, {{ Auth::user()->firstname }} {{ Auth::user()->lastname }}!</span>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 flex-column d-flex align-items-center mt-1 text-center">
                <span class="font-16">In order to have a complete sentence, the sentence must have a minimum of<br /> three word types: a subject, a verb, and an object.</span>
            </div>
        </div>
        <div class="row mt-2 d-flex justify-content-center mt-5">
            <div class="form-group col-md-8">
                <input type="text" class="form-control form-rounded bg-gray-1" id="db-search" placeholder="Enter patient code, patient name, or company name">
            </div>
        </div>
    </div>
</div>
@stop