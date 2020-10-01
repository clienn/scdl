@extends('layouts.base')

@section('search-bar')
    @include('partials.search-bar')
@stop

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
                                <select name="exam_category_id" class="form-control-1 form-rounded form-select-1 font-16">
                                    <option hidden><span class="font-gray-3">Exam Category</span></option>
                                    <option value="1">Category 1</option>
                                    @foreach($categories as $category)
                                        <option value="{{ $category->id }}" {{ count($exam) && $exam[0]->exam_category_id == $category->id ? 'selected' : ''}}>{{ $category->name }}</option>
                                    @endforeach
                                </select>    
                            </div>
                        </div>

                        <div class="row mt-4">
                            <div class="col-md-4">
                                <input type="text" name="price" class="form-control-1 form-rounded form-input-1 font-16" placeholder="Exam Price" value="{{ count($exam) ? $exam[0]->price : '' }}">
                            </div>
                            <div class="col-md-4">
                                <select name="package_id" class="form-control-1 form-rounded form-select-1 font-16">
                                    <option hidden><span class="font-gray-3">Add to package</span></option>
                                    <option value="1">Package 1</option>
                                    
                                </select>    
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