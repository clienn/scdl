@extends('layouts.base')

@section('search-bar')
    @include('partials.search-bar')
@stop

@section('db-content')
    <div id="company-list" class="container-fluid font-regular form-wrap">
        @include('ajax-forms.company-main-list')
    </div>

    <script type="text/javascript" src="{{asset('js/main.js')}}"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            initAjaxListSearch('db-search', 'company-list', 'pagination-list', "{{ URL::to('/') }}", '/company/list/search');
        });
    </script>
@stop