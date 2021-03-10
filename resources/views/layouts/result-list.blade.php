@extends('layouts.base')

@section('search-bar')
    @include('partials.search-bar')
@stop

@section('db-content')
    <div id="patient-list" class="container-fluid font-regular form-wrap">
        @include('ajax-forms.result-main-list')
    </div>

    <script type="text/javascript" src="{{asset('js/main.js')}}"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            initAjaxListSearch('db-search', 'patient-list', 'pagination-list', "{{ URL::to('/') }}", '/patient/list/search');
        });
    </script>
@stop