@extends('layouts.base')

@section('db-content')
<div class="d-flex justify-content-md-center align-items-center h-100 mt-5 mb-5">
    <div class="container-fluid font-regular form-wrap">
        <div class="row">
            <div class="col-md-10 flex-column d-flex">
                <h1 class="font-regular font-40">Create Examination</h1>
            </div>
            <div class="col-md-2 flex-column d-flex pull-right">
                <h1 class="font-regular font-16 text-right"><a href="/exam/list">View Table</a></h1>
            </div>
        </div>

        <div class="row mt-5">
            <div class="col-md-12 flex-column d-flex font-20">
                <span>Exam Code: <span class="font-bold font-lime">0924342422092434</span></span>
            </div>
        </div>

        <form method="post" action="/exam/save">
            {{ csrf_field() }}
            <input type="hidden" name="id" value="{{ count($exam) ? $exam[0]->id : 0 }}" />
            <input type="hidden" name="_method" value="{{ count($exam) ? 'PUT' : 'POST' }}">
            <!-- General Info -->
            <div class="row mt-5">
                <div class="col-md-12 flex-column d-flex">
                    <div class="container-fluid">
                        <div class="row mt-4">
                            <div class="col-md-4">
                                <input type="text" name="name" class="form-control-1 form-rounded form-input-1 font-16" placeholder="Exam Name" value="{{ count($exam) ? $exam[0]->name : '' }}">
                            </div>
                            <div class="col-md-4">
                                <!-- <select name="package_id" class="form-control-1 form-rounded form-select-1 font-16">
                                    <option hidden><span class="font-gray-3">Add to package</span></option>
                                    <option value="1">Package 1</option>
                                    
                                </select> -->  
                            </div>
                        </div>

                        <div class="row mt-4">
                            <div class="col-md-4">
                                <input type="text" name="price" class="form-control-1 form-rounded form-input-1 font-16" placeholder="Exam Price" value="{{ count($exam) ? $exam[0]->price : '' }}">
                            </div>
                            <div class="col-md-4">
                                
                                <button type="button" class="btn form-btn-2 bg-lime-1" data-toggle="modal" data-target="#examTypeModal">
                                    <span class="svg-plus">@include('svg.plus')</span>
                                    <span class="font-15">Add Exam Type Item</span>
                                </button>     
                            </div>
                        </div>
                        
                    </div>
                </div>
            </div>

            <div class="row mt-3">
                <div class="col-12">
                    <table id="tbl-exams-types" class="table tb-style-1 table-hover mt-5">
                        <thead>
                            <tr class="font-lime font-bold">
                                <th scope="col">&nbsp;</th>
                                <th scope="col">Description</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody class="font-10">
                            @foreach($exam_types as $exam_type)
                                <tr>
                                    <td scope="row" style="width:10%;"><input type="checkbox" name="exams[]" value="{{ $exam_type->id }}" checked /></td>
                                    <td>{{ $exam_type->description }}</td>
                                    <td>...</td>
                                    <!-- <td>...</td> -->
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

            @include('partials.saveinfo')

        </form>
    </div>
</div>

@include('modals.exam-type-list')

<script type="text/javascript" src="{{asset('js/main.js')}}"></script>
<script type="text/javascript">
    $(document).ready(function() {
        initAddItems('tbl-exams-types', 'exam-type-list-modal', 'examTypeModal', 'exam-type-list-pagination', 
            '/exam/type/list', "{{ URL::to('/') }}", checkSelectedExams, null);

        initAjaxPagination('exam-type-list-pagination', 'exam-type-list-modal', "{{ URL::to('/') }}", '/exam/type/search', 'exam-type-search', callback);
    });

    function callback() {
        checkSelectedExams('tbl-exams-types', 'tbl-exam-types-modal');
    }
</script>
@stop