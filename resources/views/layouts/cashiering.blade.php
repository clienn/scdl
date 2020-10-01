@extends('layouts.base')

@section('search-bar')
<form id="cashiering-form" method="post" action="/cashiering/save">
{{ csrf_field() }}
<input type="hidden" name="patient_id" />
<input type="hidden" name="total" />
<input type="hidden" name="amount_due" />
<input type="hidden" name="change_due" />

<div class="d-flex flex-column font-regular font-black-1 mt-1">
    <div class="row d-flex cashiering-top-panel">
        <div class="form-group col-md-3 panel-col panel-shadow">
            <div class="row">
                <div class="col-md-3">
                    @include('svg.user-icon-green')   
                </div>
                <div class="col-md-9">
                    <div class="row">
                        <div class="col-md-12">
                            <span class="font-15" id="patient-name" data="{{ $patient_id }}">{{ $patient_name }}</span>    
                        </div>
                        <div class="col-md-12">
                            <span class="font-15 font-lime">0716201900040</span>       
                        </div>
                        <div class="col-md-12">
                            <select name="patient_type" class="form-control-1 form-rounded form-select-1 font-16 input-bottom-border">
                                <option hidden><span class="font-gray-3">Patient Type</span></option>
                                <option value="0" {{ $type == 0 ? 'selected' : '' }} ><span class="font-gray-3">No Selection</span></option>
                                <option value="1" {{ $type == 1 ? 'selected' : '' }} >Existing</option>
                                <option value="2" {{ $type == 2 ? 'selected' : '' }} >Walk-In</option>
                            </select>   
                        </div>
                    </div>
                </div>
            </div>   

            <div class="row mt-4">
                <div class="col-md-3">
                    <span class="font-15">Date:</span>    
                </div>
                <div class="col-md-9">
                    <input type="text" name="date" class="input-bottom-border datepicker" />
                </div>
            </div>
            <div class="row mt-1">
                <div class="col-md-3">
                    <span class="font-15">No:</span>    
                </div>
                <div class="col-md-9">
                    <input type="text" name="number" class="input-bottom-border" />
                </div>
            </div>
            <div class="row mt-1">
                <div class="col-md-3">
                    <span class="font-15">Code:</span>    
                </div>
                <div class="col-md-9">
                    <input type="text" name="code" class="input-bottom-border" />
                </div>
            </div>
            <div class="row mt-5 justify-content-between pull-right">
                <div class="col-md-12">
                    <button type="button" class="btn form-btn-5 font-black-1" data-toggle="modal" data-target="#print-transaction">
                        <span class="font-10">Preview TXN</span>
                    </button>
                    <button type="button" class="btn form-btn-4 bg-lime-1" data-toggle="modal" data-target="#patient-registration-modal">
                        <span class="font-10">Add Patient</span>
                    </button>
                    
                </div>
            </div>
        </div>
        <div class="form-group col-md-9 panel-col panel-shadow ml-4">
            <div class="row justify-content-between">
                <div class="col-md-4">
                    <span class="font-15 font-bold">Exam Request Particular</span>    
                </div>
                <div class="col-md-3 text-right">
                    <a href="" data-toggle="modal" data-target="#packageExamModal">
                        @include('svg.exam-request-icon')
                        <span class="font-15 font-lime">Add Exams Request</span> 
                    </a>   
                </div>
            </div>
            <table class="table tb-style-1 mt-2" id="selectedPE">
                <thead>
                    <tr class="font-lime font-bold">
                        <th scope="col">&nbsp;</th>
                        <th scope="col">Name</th>
                        <th scope="col">Exam Type</th>
                        <th scope="col">Discount Type</th>
                        <th scope="col">Discount</th>
                        <th scope="col">Price</th>
                    </tr>
                </thead>
                <tbody class="font-10">
                    
                </tbody>
            </table>
        </div>
    </div>
</div>
@stop

@section('db-content')
    <div class="d-flex justify-content-md-center align-items-center h-100 mt-5 mb-5">
        <div class="container-fluid font-regular form-wrap">
            <div class="row font-gray-3 font-10">
                <div class="col-md-1 flex-column d-flex">
                    <span class="font-bold">Remarks:</span>
                </div>
                <div class="col-md-3 flex-column d-flex">
                    <input type="text" name="remarks" class="input-bottom-border" />
                </div>
                <div class="col-md-1 flex-column d-flex">
                    <span class="font-bold">Discount %:</span>
                </div>
                <div class="col-md-3 flex-column d-flex">
                    <input type="text" name="discount" class="input-bottom-border" />
                </div>
                <div class="col-md-1 flex-column d-flex ml-4">
                    <span class="font-bold">Total:</span>
                </div>
                <div class="col-md-2 flex-column d-flex text-right font-20">
                    <span id="total">0.00</span>
                </div>
            </div>
            <div class="row font-gray-3 font-10">
                <div class="col-md-5 flex-column d-flex">
                    
                </div>
                <div class="col-md-3 flex-column d-flex">
                    <div class="row justify-content-between">
                        <div class="col-md-3 flex-column d-flex form-check ml-3">
                            <input type="radio" name="discount_type" class="form-check-input" value="0" checked>
                            <label class="form-check-label">None</label>
                        </div>
                        <div class="col-md-4 flex-column d-flex form-check">
                            <input type="radio" name="discount_type" class="form-check-input" value="1">
                            <label class="form-check-label">Percentage</label>
                        </div>
                        <div class="col-md-3 flex-column d-flex form-check">
                            <input type="radio" name="discount_type" class="form-check-input" value="2">
                            <label class="form-check-label">Fixed</label>
                        </div>
                    </div>
                </div>
                <div class="col-md-2 flex-column d-flex ml-4">
                    <span class="font-bold">Amount Due:</span>
                </div>
                <div class="col-md-1 flex-column d-flex text-right font-20">
                    <span id="amount-due" class="font-black-1 font-24">0.00</span>
                </div>
            </div>
            <div class="row font-gray-3 font-10 mt-5">
                <div class="col-md-2 flex-column d-flex">
                    <span>Payment Particular</span>
                </div>
                <div class="col-md-10 flex-column d-flex hr-dashed vcenter"></div>
                
            </div>
            <div class="row font-gray-3 font-10 mt-4">
                <div class="col-md-1 flex-column d-flex">
                    <span class="font-bold">Payment:</span>
                </div>
                <div class="col-md-2 flex-column d-flex">
                    <select name="payment_method" class="input-bottom-border">
                        <option value="cash">Cash</option>
                        <option value="check">Check</option>
                        <optgroup label="Credit">
                            <option value="Master Card Visa">Master Card Visa</option>
                            <option value="Bancnet">Bancnet</option>
                            <option value="Megalink ">Megalink </option>
                        </optgroup>
                        <optgroup label="Debit">
                            <option value="Metrobank">Metrobank</option>
                            <option value="BDO ">BDO </option>
                            <option value="BPI">BPI</option>
                            <option value="Landbank">Landbank</option>
                            <option value="Citibank">Citibank</option>
                            <option value="PNB">PNB</option>
                            <option value="CPB">CPB</option>
                            <option value="DBP">DBP</option>
                            <option value="Chinabank">Chinabank</option>
                            <option value="AlliedBank">AlliedBank</option>
                            <option value="UnionBank">UnionBank</option>
                            <option value="RCBC">RCBC</option>
                        </optgroup>
                        <optgroup label="HMO">
                            <option value="Cocolife">Cocolife</option>
                            <option value="Intellicare">Intellicare</option>
                            <option value="Maxicare">Maxicare</option>
                            <option value="Inlife Insular Health Care">Inlife Insular Health Care</option>
                            <option value="Manulife">Manulife</option>
                            <option value="Philcare">Philcare</option>
                            <option value="Pacific Cross">Pacific Cross</option>
                            <option value="Avega">Avega</option>
                            <option value="Medicard">Medicard</option>
                            <option value="Carehealth Plus">Carehealth Plus</option>
                            <option value="Life and Health">Life and Health</option>
                            <option value="1Coop health">1Coop health</option>
                            <option value="Active One Health Inc.">Active One Health Inc.</option>
                            <option value="Eastwest Health care">Eastwest Health care</option>
                            <option value="Prulife UK">Prulife UK</option>
                        </optgroup>
                    </select>
                </div>
                <div class="col-md-2 flex-column d-flex text-right">
                    <span class="font-bold">Sales Invoice:</span>
                </div>
                <div class="col-md-3 flex-column d-flex">
                    <input type="text" name="sales_invoice" class="input-bottom-border" />
                </div>
                <div class="col-md-1 flex-column d-flex ml-4">
                    <span class="font-bold">Tendered:</span>
                </div>
                <div class="col-md-2 flex-column d-flex text-right">
                    <input type="text" name="tendered" class="input-bottom-border" />
                </div>
            </div>
            <div class="row font-10 mt-4">
                <div class="col-md-8"></div>
                <div class="col-md-1 flex-column d-flex ml-4">
                    <span class="font-bold font-gray-3">Change Due:</span>
                </div>
                <div class="col-md-2 flex-column d-flex text-right">
                    <span class="font-lime font-bold font-20" id="change-due">0.00</span>
                </div>
            </div>

            <div class="row mt-5 justify-content-between pull-right">
                <div class="col-md-8 flex-column d-flex"></div>
                <div class="col-md-4">
                    <button type="submit" class="btn form-btn-3 font-black-1">
                        <span class="font-15">Cancel</span>
                    </button>
                    <button type="submit" class="btn form-btn-2 bg-lime-1">
                        <span class="svg-plus">@include('svg.commit-transaction-icon')</span>
                        <span class="font-15">Commit Transaction</span>
                    </button>
                    
                </div>
            </div>
            
        </div>
    </div>

</form>
    <script type="text/javascript" src="{{asset('js/main.js')}}"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            initAjaxPagination('patient-list-pagination', 'search-patient-modal', "{{ URL::to('/') }}", '/cashiering/patient/list', 'patient-search');

            initAjaxPagination('exam-list-pagination', 'examListTab', "{{ URL::to('/') }}", '/cashiering/package/exam/list', 'package-exam-search', callback);
            initAjaxPagination('package-list-pagination', 'packageListTab', "{{ URL::to('/') }}", '/cashiering/package/list', 'package-exam-search', callback);
            
            $('select[name="patient_type"]').change(function() {
                let val = $(this).val();
                if (val == 1) {
                    $('#patient-search-modal').modal('show');
                } else if (val == 2) {
                    $('#patient-registration-modal').modal('show');
                }
            });

            $('#packageExamModal').on('show.bs.modal', function (event) {
                callback();
            });
            
            // $('#packageInfoModal').on('show.bs.modal', function (event) {
                
            // });

            $(document).on('click', '.package-info', function(e) {
                let id = $(this).attr('data');
                let base_url = "{{ URL::to('/') }}";
                let ajax_url = base_url + '/cashiering/package/info?id=' + id;

                $.get(ajax_url, function(data) {
                    $('#package-info-modal').html(data);
                });
            });

            $(document).on('click', '#packageTableModal input[type="checkbox"], #examTableModal input[type="checkbox"]', function(e) {
                let flag = $(this).is(':checked');

                let tr = $(this).parents('tr');
                let id = tr.parents('table').attr('id');

                let code = $(this).parent().html();
                let name = '';
                let type = 'selected exam';
                let discount_type = 0;
                let discount = '0';
                let price = '0.00';
                let discount_type_desc = ['None', 'Percentage', 'Fixed'];

                if (id == 'examTableModal') {
                    name = $('td:eq(1)', tr).html();
                    price = $('td:eq(3)', tr).html();
                } else {
                    // console.log(tr.html());
                    let pid = $(this).val();
                    pid = pid.replace(/p/, "");    

                    name = $('td:eq(1)', tr).html();
                    type = '<a href="" class="package-info" data="' + pid + '" data-toggle="modal" data-target="#packageInfoModal">package</a>';
                    discount_type = $('td:eq(2)', tr).html();
                    discount = $('td:eq(3)', tr).html();
                    price = $('td:eq(4)', tr).html();
                }

                let html = '<td>' + code + '</td>';
                html += '<td>' + name + '</td>';
                html += '<td>' + type + '</td>';
                html += '<td>' + discount_type_desc[discount_type] + '</td>';
                html += '<td>' + discount + '</td>';
                html += '<td>' + price + '</td>';
                
                let elem = $('<tr>' + html + '</tr>');
                elem.find('input[type="checkbox"]').prop('checked', true);

                let currElem = $('#selectedPE').find('input[value="' + $(this).val() + '"');

                if (currElem.length == 0) {
                    $('#selectedPE tbody').append(elem);
                }

                currElem.prop('checked', flag);

                updateTotalPrice();
            });

            $(document).on('click', '#selectedPE input[type="checkbox"]', function(e) {
                updateTotalPrice();
            });

            $(document).on('click', 'input[name="discount_type"]', function(e) {
                updateTotalPrice();
            });

            $('input[name="discount"]').keyup(function() {
                updateTotalPrice();
            });

            $('input[name="tendered"]').keyup(function() {
                // let amount = parseInt($(this).val());
                // let total = parseInt($('#total').html());
                // if (amount >= total) {
                //     $('#change-due').html((amount - total).toFixed(2));
                // }
                updateTotalPrice();
            });

            $(document).on('click', '#search-patient-modal table tbody tr', function() {
                $('tr.selected').removeClass('selected');
                $(this).addClass('selected');
            });

            $('#btn-confirm_patient_selection').click(function() {
                let tr = $('#search-patient-modal table tbody tr.selected');

                let id = $('td:eq(0)', tr).html();

                if (id) {
                    let lastname = $('td:eq(1)', tr).html();
                    let firstname = $('td:eq(2)', tr).html();
                    let middlename = $('td:eq(3)', tr).html();

                    $('#patient-name').html(firstname + ' ' + middlename + ' ' + lastname);
                    $('#patient-name').attr('data', id);

                    $('#patient-search-modal').modal('hide');
                }
            });

            $('#btn-close-patient-search').click(function() {
                $('#patient-search-modal').modal('hide');
            });

            // $('input[name="date"]').datepicker({
            //     dateFormat: 'yy-mm-dd'
            // });

            $('#print-transaction').on('show.bs.modal', function (event) {
                $('#txn-list tbody').html('');

                $('#selectedPE input[type="checkbox"]').each(function(i) {
                    let flag = $(this).is(':checked');
                    let html = '';

                    if (flag) {
                        let p = $(this).parents('tr');
                        let exam_name = p.find('td:eq(1)').html();
                        let price = p.find('td:eq(5)').html();

                        html += '<tr>';
                        html += '<td>' + (i + 1) + '</td>';
                        html += '<td>&nbsp;</td>';
                        html += '<td>Laboratory</td>';
                        html += '<td>LAB0 - 0716201900040-' + i + '</td>';
                        html += '<td>' + exam_name + '</td>';
                        html += '<td>' + price + '</td>';
                        html += '</tr>';

                        $('#txn-list tbody').append(html);
                    }
                });
                let tendered = parseInt($('input[name="tendered"]').val());
                if (!tendered) tendered = 0;

                let discount = parseInt($('input[name="discount"]').val()).toFixed(2);
                let discount_type = $('input[name="discount_type"]:checked').val();

                if (discount_type == 1) {
                    discount += '%'
                }

                $('#txn-discount').html(discount);
                $('#txn-total').html($('#total').html());
                $('#txn-amount-due').html($('#amount-due').html());
                $('#txn-tendered').html(tendered.toFixed(2));
                $('#txn-change-due').html($('#change-due').html());

                $('#txn-patient-name').html($('#patient-name').html());
            });

            $('#cashiering-form').submit(function(e) {
                let id = $('#patient-name').attr('data');
                
                if (id > 0) {
                    $('input[name="patient_id"]').val(id);
                    $('input[name="total"]').val($('#total').html());
                    $('input[name="amount_due"]').val($('#amount-due').html());
                    $('input[name="change_due"]').val($('#change-due').html());
                    
                    return true;
                }
                
                return false;
            });

        });

        function callback() {
            checkSelectedExams('selectedPE', 'examListTab');
            checkSelectedExams('selectedPE', 'packageListTab');
        }

        function updateTotalPrice() {
            let total = 0;
            let discount = $('input[name="discount"]').val() || 0;
            
            let discount_type = parseInt($('input[name="discount_type"]:checked').val());
            
            $('#selectedPE input[type="checkbox"]').each(function() {
                let price = parseInt($(this).parents('tr').find('td:eq(5)').html());
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

            $('#total, #amount-due').html(total.toFixed(2));

            updateTendered();
        }

        function updateTendered() {
            let amount = parseInt($('input[name="tendered"]').val());
            let total = parseInt($('#total').html());

            if (amount >= total) {
                $('#change-due').html((amount - total).toFixed(2));
            }
        }
    </script>
@stop

@include('modals.patient-registration')
@include('modals.search-patient')
@include('modals.package-exam')
@include('modals.package-info')
@include('modals.print-transaction')