@extends('layouts.base')

@section('search-bar')
    @include('partials.search-bar')
@stop

@section('db-content')
    <div id="exam-type-list" class="container-fluid font-regular form-wrap">
        @include('ajax-forms.exam-types')
    </div>

    <script type="text/javascript" src="{{asset('js/main.js')}}"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            initAjaxListSearch('db-search', 'exam-type-list', 'exam-type-list-pagination', "{{ URL::to('/') }}", '/exam_type/list/search');
        
            $(document).on('click', 'a.delete-exam-item', function(e) {
                let flag = confirm("Are you sure you want to delete this item?");
                if (flag) {
                    return true;
                } else {
                    e.preventDefault();
                    return false;
                }
            });
        });
    </script>
@stop