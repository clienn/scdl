@extends('layouts.base')

@section('db-content')
<div class="d-flex justify-content-md-center">
    <div class="container-fluid font-regular form-wrap-2 ml-2" style="z-index:999;">
        <div class="row">
            <div class="col-md-11 flex-column d-flex pull-right mr-2">
                <h1 class="font-regular font-16 text-right"><a href="/patient/list">Patient List</a></h1>
            </div>
        </div>
        <div role="tabpanel">
            <!-- Nav tabs -->
            <ul class="result-list-nav nav nav-tabs">
                <li class="nav-item">
                    <a class="nav-link active" href="#activeTab" aria-controls="activeTab" role="tab" data-toggle="tab">Patient Test Archive</a>
                </li>
            </ul>
            <!-- Tab panes -->
            <div class="tab-content">
                <div role="tabpanel" class="tab-pane active" id="activeTab">
                    <div class="container-fluid">
                        @include('ajax-forms.result-main-list')
                    </div>
                </div>
            </div>
        </div>
        
    </div>

    <div class="container-fluid font-regular form-wrap border-lime-2">
        <div class="row mt-1">
            <div class="col-md-12">
                <select name="tests" class="form-control-1 form-rounded form-select-1 font-16">
                    <option value="0">Select Test</option>
                    @foreach($packages as $package)
                    <option value="p{{$package->id}}">{{ $package->name }}</option>
                    @endforeach
                    @foreach($exams as $exam)
                    <option value="e{{$exam->id}}">{{ $exam->name }}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <div class="row mt-4">
            <div id="exam-form-controls" class="col-md-12 hide">
                <div class="row mt-2">
                    <div class="col-md-4"></div>
                    <div class="col-md-8 text-right">
                        <button type="submit" id="btn-print-results" class="btn form-btn-1 bg-lime-1" data-toggle="modal" data-target="#print-results">
                            <span class="svg-plus">@include('svg.print-icon')</span>
                            <span class="font-15">Print</span>
                        </button>
                    </div>
                </div>
                <div class="row mt-2">
                    <div class="col-md-12">
                        <div class="alert alert-success hide" role="alert">
                            Successfully saved results.
                        </div>
                        
                        <div class="alert alert-warning hide" role="alert">
                            There was a problem saving the results.
                        </div>
                    </div>
                </div>
            </div>
            <div id="exam-form" class="col-md-12 hide">
                <div class="row mt-2">
                    <div class="col-md-4"></div>
                    <!-- <div class="col-md-4 text-right">
                        
                    </div> -->
                    
                </div>
                <div class="row mt-3">
                    <div class="col-md-4">
                        <span class="font-15 font-black-2 font-bold">Type of Examination</span>
                    </div>
                    <div class="col-md-4 text-center">
                        <span class="font-15 font-black-2 font-bold">Results</span>
                    </div>
                    <div class="col-md-4 text-center">
                        <span class="font-15 font-black-2 font-bold">Normal Values</span>
                    </div>
                </div>
                <div class="row mt-2 font-10">
                    <div id="exam-panel" class="col-md-12"></div>
                </div>
            </div>

            <div id="package-form" class="col-md-12 flex-column d-flex mt-2">
                <div id="exam-tabs" role="tabpanel">
                    
                </div>
                
            </div>
        </div>

        
    </div>
</div>

<script type="text/javascript">
    var g_exam_results = '';
    var g_patient_name = '';
    var g_txn_date = '';

    $(document).ready(function() {
        var testHeader = '';
        var modal = '';
        var count = 0;

        $('select[name="tests"] option').attr('disabled', true);

        $('.testmodal').click(function() {
            testHeader = $('span', this).html();
            modal = $(this).attr('data-target');
        });

        $('.result-list-nav li').click(function() {
            showExamsForm(false);
            $('select[name="tests"]').val(0);
            $('select[name="tests"] option').attr('disabled', true);
        });

        // $('.tbl-results tbody tr').click(function() {
        $(document).on('click', '.tbl-results tbody tr', function(e) {
            $('table tbody tr').removeClass('border-lime-2');
            $('table tbody tr').removeClass('rborder-white-3');
            $('table tbody tr').removeClass('curr');

            $(this).addClass('curr');
            $(this).addClass('border-lime-2');
            $(this).addClass('rborder-white-3');

            let e_results = $('input', this).val();
            g_exam_results = e_results ? JSON.parse($('input', this).val()) : '';
            g_patient_name = $('td:eq(1)', this).html();
            g_txn_date = $('td:eq(3)', this).html();

            let exams = ($(this).attr('data-exams')).split(",");
            let packages = ($(this).attr('data-packages')).split(",");

            let h_exams = [];
            let h_packages = [];

            for (var id in exams) {
                h_exams['e' + exams[id]] = 1;
            }

            for (var id in packages) {
                h_packages['p' + packages[id]] = 1;
            }

            // console.log(exams);

            $('select[name="tests"] option').attr('disabled', true);
            $('select[name="tests"]').val('0');

            $('select[name="tests"] option').each(function() {
                let val = $(this).val();
                if (h_exams[val] | h_packages[val]) {
                    $(this).attr('disabled', false);
                }
            });

            showExamsForm(false);
        });

        $('select[name="tests"]').change(function() {
            let str = $(this).val();
            let key = str[0];
            let id = parseInt(str.substr(1));

            showExamsForm(false);
            
            let fd = new FormData();
            fd.append('id', id);
            fd.append('key', key);

            $.ajax({
                url: '/test/form?id=' + id + '&key=' + key,
                type: 'get',
                contentType: false,
                processData: false,
                success: function(response){
                    if (response.success) {
                        let data = JSON.parse(response.data);

                        if (key == 'e') {
                            let html = mkTestForm(data, str);
                            showExamsForm(true);
                            $('#exam-panel').html(html);
                        } else if (key == 'p') {
                            let ul = '<ul class="nav nav-tabs">';
                            let content = '<div class="tab-content">';

                            let it = 0;
                            let active = ' active';

                            for (var k in data) {
                                let tabkey = 'tab' + it;
                                let exam_id = data[k][1];

                                ul += '<li class="nav-item">';
                                ul += '<a class="nav-link' + active + '" href="#' + tabkey + '" aria-controls="' + tabkey + '" role="tab" data-toggle="tab">' + k + '</a>';
                                ul += '</li>';

                                content += '<div role="tabpanel" data-id="' + exam_id + '" class="exam_type tab-pane' + active+ '" id="' + tabkey + '">' + examHeaders() + mkTestForm(data[k][0], str, exam_id) + '</div>';
                                
                                ++it;
                                active = '';
                            }
                            
                            ul += '</ul>';
                            content += '</div>';

                            let html = ul + content;
                            $('#exam-tabs').html(html);

                            showFormControls(true);
                        }
                        
                    }
                },
            });
        });

        $('#print-results').on('show.bs.modal', function (event) {
            let html = '';
            let count = 0;

            let header = $('select[name="tests"] option:selected').text();

            $('#txn-patient-name').html(g_patient_name);
            $('#txn-date').html(g_txn_date);

            $('.exam-input').each(function() {
                // let m = i & 1 ? 'ml-4' : '';
                let pLabel = $(this).parent().prev().prev().html();
                let pNvalue = $(this).parent().prev().html();

                $('#result-desc').html(header);
                let label = pLabel;
                let value = $(this).val();
                let nvalue = pNvalue;
                
                html += '<div class="col-3 font-bold">' + label + ': </div>';
                html += '<div class="col-3">' + value + ' (' + nvalue + ')</div>';

                count++;
            });

            if (count & 1) {
                html += '<div class="col-3 font-bold">&nbsp;</div>';
                html += '<div class="col-3">&nbsp;</div>';
            }

            $('#results-display').html(html);
        });
    });

    function mkTestForm(data, key, exam_id) {
        let html = '';
        let c = 0;

        for (var k in data) {
            let bg = (c++ & 1) ? 'bg-gray-1' : '';
            html += '<div class="row mt-1 ' + bg + '">';
            html += '<div class="col-md-4 mt-1">' + data[k].description + '</div>';
            html += '<div class="col-md-4 text-center mt-1">' + data[k].normal_values.replace('~', '<br />') + '</div>';
            
            let result = '';

            if (key[0] == 'p') {
                if (g_exam_results && g_exam_results[key] && g_exam_results[key][exam_id]) {
                    result = g_exam_results[key][exam_id][data[k].id];
                }
            } else {
                result = (g_exam_results && g_exam_results[key]) ? g_exam_results[key][data[k].id] : '';
            }

            html += '<div class="col-md-4 text-center mt-1"><input type="text" data-id="' + data[k].id + '" class="exam-input form-rounded form-input-2 font-10 autocomplete="off" value="' + result + '" readonly></div>';
            
            // if (data[k].type == 0) {
            //     html += '<div class="col-md-4 text-center mt-1"><input type="text" data-id="' + data[k].id + '" class="exam-input form-rounded form-input-2 font-10 autocomplete="off" value="' + result + '" readonly></div>';
            // } else if (data[k].type == 1) {
            //     let choices = data[k].choices ? data[k].choices.split(',') : '';
            //     html += '<div class="col-md-4 text-center mt-1"><select data-id="' + data[k].id + '" class="exam-input form-control-1 form-rounded form-select-2 font-10" readonly>';
            //     for (var i in choices) {
            //         let sel = '';
            //         if (result == choices[i]) {
            //             sel = ' selected';
            //         }
            //         html += '<option value="' + choices[i] + '"' + sel + '>' + choices[i] + '</option>'
            //     }
            //     html += '</select></div>';
            // }
            html += '</div>';
        }

        html += '<div class="row mt-2">';
        html += '<div class="col-md-6 text-center"><span>Medical Technologist</span></div>'
        html += '<div class="col-md-6 text-center"><span>Pathologist</span></div>'
        html += '</div>';

        return html;
    }

    function examHeaders() {
        let html = '<div class="row mt-2">';
        html += '<div class="col-md-4">';
        html += '<span class="font-15 font-black-2 font-bold">Type of Examination</span>';
        html += '</div>';
        html += '<div class="col-md-4 text-center">';
        html += '<span class="font-15 font-black-2 font-bold">Results</span>';
        html += '</div>';
        html += '<div class="col-md-4 text-center">';
        html += '<span class="font-15 font-black-2 font-bold">Normal Values</span>';
        html += '</div>';
        html += '</div>';

        return html;
    }

    function showExamsForm(flag) {
        $('#exam-panel').html('');
        $('#exam-tabs').html('');

        if (flag) {
            $('#exam-form').removeClass('hide');
        } else {
            $('#exam-form').addClass('hide');
        }

        showFormControls(flag);
    }

    function showFormControls(flag) {
        if (flag) {
            $('#exam-form-controls').removeClass('hide');
        } else {
            $('#exam-form-controls').addClass('hide');
        }
    }
</script>

@stop

@include('modals.print-results')