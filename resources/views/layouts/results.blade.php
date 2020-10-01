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
                <span class="font-16">Currently under construction. <br /> Will display patient examinations and management of data.</span>
            </div>
        </div>
    </div>
</div>
@stop