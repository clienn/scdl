@extends('layouts.base')

@section('search-bar')
    @include('partials.search-bar')
@stop

@section('db-content')
<div class="d-flex justify-content-md-center align-items-center h-100 mt-5 mb-5">
    <div class="container font-regular">
        <div class="row">
            <div class="col-md-12 flex-column d-flex align-items-center">
                @include('svg.no-result')
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 flex-column d-flex align-items-center mt-2">
                <span class="font-50">No records founds.</span>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 flex-column d-flex align-items-center mt-1 text-center">
                <span class="font-16">In order to have a complete sentence, the sentence must have a minimum <br /> of three word types: a subject, a verb, and an object.</span>
            </div>
        </div>
    </div>
</div>
@stop