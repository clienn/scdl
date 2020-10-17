@extends('layouts.base')

@section('db-content')
<div class="d-flex justify-content-md-center align-items-center h-100 mt-5 mb-5">
    <div class="container-fluid font-regular form-wrap">
        <div class="row">
            <div class="col-md-10 flex-column d-flex">
                <h1 class="font-regular font-40">Create Package</h1>
            </div>
            <div class="col-md-2 flex-column d-flex pull-right">
                <h1 class="font-regular font-16 text-right"><a href="/package/list">View Table</a></h1>
            </div>
        </div>

        <form method="post" action="/package/save">
            {{ csrf_field() }}
            <input type="hidden" name="id" value="{{ count($package) ? $package[0]->id : 0 }}" />
            <input type="hidden" name="_method" value="{{ count($package) ? 'PUT' : 'POST' }}">
            <!-- General Info -->
            <div class="row mt-5">
                <div class="col-md-12 flex-column d-flex">
                    <div class="container-fluid">
                        <div class="row mt-4">
                            <div class="col-md-4">
                                <input type="text" name="name" class="form-control-1 form-rounded form-input-1 font-16" placeholder="Package Name" value="{{ count($package) ? $package[0]->name : '' }}">
                            </div>
                            <div class="col-md-4">
                                <input type="text" name="price" class="form-control-1 form-rounded form-input-1 font-16" placeholder="Package Price" value="{{ count($package) ? $package[0]->price : '' }}">
                            </div>
                            <div class="form-group col-md-4">
                                <button type="button" class="btn form-btn-2 bg-lime-1" data-toggle="modal" data-target="#examModal">
                                    <span class="svg-plus">@include('svg.plus')</span>
                                    <span class="font-15">Add Exams</span>
                                </button>    
                            </div>
                        </div>
                        
                    </div>
                </div>
            </div>

            <table id="package-exams" class="table tb-style-1 table-hover mt-5">
                <thead>
                    <tr class="font-lime font-bold">
                        <th scope="col">&nbsp;</th>
                        <th scope="col">Name</th>
                        <th scope="col">Category</th>
                        <th scope="col">Price</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody class="font-10">
                    @foreach($package_exams as $exam)
                    <tr>
                        <td scope="row" style="width:10%;"><input type="checkbox" name="exams[]" value="{{ $exam->id }}" checked /></td>
                        <td>{{ $exam->name }}</td>
                        <td>{{ $exam->category }}</td>
                        <td>{{ $exam->price }}</td>
                        <td>...</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>

            <div class="container-fluid font-regular form-wrap">
                <div class="row">
                    <div class="col-md-2 flex-column d-flex">
                        <h1 class="font-regular font-16">Package Discount: </h1>
                    </div>
                    <div class="col-md-3 flex-column d-flex">
                        <input type="text" name="discount" class="input-bottom-border" value="{{ count($package) ? $package[0]->discount : '' }}"/>
                        <div class="container-fluid font-regular font-10">
                            <div class="row justify-content-between">
                                <div class="col-md-3 flex-column d-flex form-check ml-3">
                                    <input type="radio" name="discount_type" class="form-check-input" value="0" {{ count($package) && $package[0]->discount_type == 0 ? 'checked' : '' }}>
                                    <label class="form-check-label">None</label>
                                </div>
                                <div class="col-md-4 flex-column d-flex form-check">
                                    <input type="radio" name="discount_type" class="form-check-input" value="1" {{ count($package) && $package[0]->discount_type == 1 ? 'checked' : '' }}>
                                    <label class="form-check-label">Percentage</label>
                                </div>
                                <div class="col-md-3 flex-column d-flex form-check">
                                    <input type="radio" name="discount_type" class="form-check-input" value="2" {{ count($package) && $package[0]->discount_type == 2 ? 'checked' : '' }}>
                                    <label class="form-check-label">Fixed</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-2 flex-column d-flex">
                        <h1 class="font-regular font-16 text-right">Total Package Price: </h1>
                    </div>
                    <div class="col-md-1 flex-column d-flex text-right ml-5">
                        <h1 id="total-package-price" class="font-regular font-16">{{ count($package) ? $package[0]->price : '0.00' }}</h1>
                        
                    </div>
                </div>
            </div>

            @include('partials.saveinfo')

        </form>
    </div>
</div>

@include('modals.exam-list')

<script type="text/javascript" src="{{asset('js/main.js')}}"></script>
<script type="text/javascript">
    $(document).ready(function() {
        initAddItems('package-exams', 'exam-list-modal', 'examModal', 'exam-list-pagination', 
            '/package/exam/list', "{{ URL::to('/') }}", checkSelectedExams, updatePackageTotalPrice);

        $(document).on('click', '#package-exams input[type="checkbox"]', function(e) {
            updatePackageTotalPrice();
        });

        $(document).on('click', 'input[name="discount_type"]', function(e) {
            updatePackageTotalPrice();
        });

        $('input[name="discount"]').keyup(function() {
            updatePackageTotalPrice();
        });
    });

    function updatePackageTotalPrice() {
        let total = 0;
        let discount = $('input[name="discount"]').val() || 0;
        
        let discount_type = parseInt($('input[name="discount_type"]:checked').val());
        
        $('#package-exams input[type="checkbox"]').each(function() {
            let price = $(this).parents('tr').find('td:eq(3)').html();
            total += price * $(this).is(':checked');
        });

        switch (discount_type) {
            case 1:
                total -= total * (discount / 100);
                break;

            case 2:
                total -= discount;
                break;
        }
        
        $('#total-package-price').html(total.toFixed(2));
        $('input[name="price"]').val(total.toFixed(2));
    }
</script>
@stop