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
                <span class="font-16">Will display patient examinations and management of data.</span>
            </div>
        </div>
        <div class="row mt-3">
            <div class="col-md-12 flex-column d-flex align-items-center mt-1 text-center font-8">
                <button type="button" class="testmodal btn form-btn-2 bg-lime-1" data-toggle="modal" data-target="#bloodChemExecutiveModal">
                    <span class="font-15">Blood Chem Executive</span>
                </button>  

                <button type="button" class="testmodal btn form-btn-2 bg-lime-1 mt-2" data-toggle="modal" data-target="#bloodChemFullModal">
                    <span class="font-15">Blood Chem Full</span>
                </button> 

                <button type="button" class="testmodal btn form-btn-2 bg-lime-1 mt-2" data-toggle="modal" data-target="#bloodChemStandardModal">
                    <span class="font-15">Blood Chem Standard</span>
                </button> 

                <button type="button" class="testmodal btn form-btn-2 bg-lime-1 mt-2" data-toggle="modal" data-target="#bloodChemModal">
                    <span class="font-15">Blood Chem</span>
                </button> 
                
                <button type="button" class="testmodal btn form-btn-2 bg-lime-1 mt-2" data-toggle="modal" data-target="#tibcFerritinModal">
                    <span class="font-15">TIBC and Ferritin</span>
                </button> 
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    $(document).ready(function() {
        var testHeader = '';
        var modal = '';
        var count = 0;

        $('.testmodal').click(function() {
            testHeader = $('span', this).html();
            modal = $(this).attr('data-target');
        });

        $('#print-results').on('show.bs.modal', function (event) {
            let html = '';

            $(modal + ' .tresults').each(function(i) {
                // let m = i & 1 ? 'ml-4' : '';
                $('#result-desc').html(testHeader);
                let label = $('span', this).html();
                let value = $('input:first', this).val();
                let nvalue = $('input:eq(1)', this).attr('placeholder');
                
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
</script>

@include('modals.blood-chem-executive')
@include('modals.blood-chem-full')
@include('modals.blood-chem-standard')
@include('modals.blood-chem')
@include('modals.tibc-ferritin')
@include('modals.print-results')

@stop