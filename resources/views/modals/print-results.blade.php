<div class="modal fade" id="print-results" tabindex="-1" role="dialog" aria-labelledby="printModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="psModalLabel">Print Preview</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
            <div class="row">
                <div class="col-md-12 text-center">
                    @include('svg.scdl-logo-solo')
                </div>
                <div class="col-md-12 text-center mt-2">
                    <span class="font-20 font-black-2">Davao Specialists Clinic & Diagnostic Laboratory Inc.</span>
                </div>
                <div class="col-md-12 text-center mt-2">
                    <span class="font-10 font-black">Sta. Ana Avenue Davao City</span>
                </div>
            </div>
            <div class="row mt-5 font-10">
                <div class="col-md-2">
                    <span>Patient ID:</span>
                </div>
                <div class="col-md-3">
                    <span>071620190004</span>
                </div>
                
                <div class="col-md-2">
                    <span>Transaction ID:</span>
                </div>
                
                <div class="col-md-3">
                    <span>TRN - 0716201900040</span>
                </div>
            </div>
            <div class="row font-10">
                <div class="col-md-2">
                    <span>Name: </span>
                </div>
                <div class="col-md-3">
                    <span id="txn-patient-name">John Mark D Dosejo</span>
                </div>

                <div class="col-md-2">
                    <span>Date:</span>
                </div>
                
                <div class="col-md-3">
                    <span>{{ date('Y-m-d') }}</span>
                </div>
            </div>

            <div class="row mt-5">
                <div class="col-12 text-center ">
                    <span id="result-desc" class="font-bold font-20">Results</span>
                </div>
            </div>
            
            <div id="results-display" class="row mt-4 justify-content-center font-12">

            </div>

            <div class="row font-10 justify-content-end mt-5">
                <div class="col-md-3">
                    <span>Discount: <span id="txn-discount">0.00</span></span>
                </div>

                <div class="col-md-2">
                    <span>Total:</span>
                </div>
                <div class="col-md-2 text-right">
                    <span id="txn-total">0.00</span>
                </div>
            </div>
            <div class="row font-10 justify-content-end">
                <div class="col-md-2">
                    <span>Amount Due:</span>
                </div>
                <div class="col-md-2 text-right">
                    <span id="txn-amount-due">0.00</span>
                </div>
            </div>
            <div class="row font-10 justify-content-end">
                <div class="col-md-2">
                    <span>Tendered:</span>
                </div>
                <div class="col-md-2 text-right">
                    <span id="txn-tendered">0.00</span>
                </div>
            </div>
            <div class="row font-10 justify-content-end">
                <div class="col-md-2">
                    <span>Change Due:</span>
                </div>
                <div class="col-md-2 text-right">
                    <span id="txn-change-due">0.00</span>
                </div>
            </div>
      </div>
      <div class="modal-footer">
            <!-- <button type="submit" class="btn form-btn-3 font-black-1">
                <span class="font-15">Close</span>
            </button> -->
            <button type="submit" class="btn form-btn-2 bg-lime-1">
                <span class="svg-plus">@include('svg.print-icon')</span>
                <span class="font-15">Print Results</span>
            </button>
      </div>
    </div>
  </div>
</div>
