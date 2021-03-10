<div class="modal fade" id="bloodChemExecutiveModal" tabindex="-1" role="dialog" aria-labelledby="bloodChemExecutiveModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title font-bold" id="psModalLabel">Blood Chem Executive</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
            <div class="row justify-content-between">
                <div class="col-md-12 mt-2">
                    <span class="font-15 font-black-2">Transaction No.</span>
                </div>
                <div class="col-md-12 mt-2">
                    <div class="row">
                        <div class="col-md-8">
                            <input type="text" name="name" class="form-control-1 form-rounded form-input-1 font-10" autocomplete="off" placeholder="Name" value="">
                        </div>
                        <div class="col-md-4">
                            <input type="text" name="age" class="form-control-1 form-rounded form-input-1 font-10" autocomplete="off" placeholder="Age" value="">
                        </div>
                    </div>

                    <div class="row mt-2">
                        <div class="col-md-8">
                            <input type="text" name="physician" class="form-control-1 form-rounded form-input-1 font-10" autocomplete="off" placeholder="Physician" value="">
                        </div>
                        <div class="col-md-4">
                            <input type="text" name="date" class="form-control-1 form-rounded form-input-1 font-10 datepicker" autocomplete="off" placeholder="Date" value="">
                        </div>
                    </div>

                    <div class="row mt-5">
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

                    <div class="row mt-3"></div>

                    @foreach($blood_chem_executive as $item)
                    <div class="row mt-2 tresults">
                        <div class="col-md-4">
                            <span class="font-15 font-black-2">{{ $item[0] }}</span>
                        </div>
                        <div class="col-md-4 text-center">
                            <input type="text" name="fasting_results" class="form-control-1 form-rounded form-input-1 font-10" autocomplete="off">
                        </div>
                        <div class="col-md-4 text-center">
                            <input type="text" name="fasting_normal_values" class="form-control-1 form-rounded form-input-1 font-10" autocomplete="off" placeholder="{{ $item[1] }}">
                        </div>
                    </div>
                    @endforeach

                    <div class="row mt-5 justify-content-center">
                        <div class="col-md-5">
                            <select name="status" class="form-control-1 form-rounded form-select-1 font-10">
                                <option hidden>Medical Technologist</option>
                            </select>
                        </div>
                        <div class="col-md-5">
                            <select name="status" class="form-control-1 form-rounded form-select-1 font-10">
                                <option hidden>Pathologist</option>
                            </select>
                        </div>
                    </div>
                </div>

                
            </div>
      </div>
      <div class="modal-footer">
            <!-- <button type="submit" class="btn form-btn-3 font-black-1">
                <span class="font-15">Close</span>
            </button> -->
            <button type="button" class="btn form-btn-5 font-black-1" data-toggle="modal" data-target="#print-results">
                <span class="font-10">Preview</span>
            </button>
            <button type="submit" class="btn form-btn-2 bg-lime-1">
                <span class="svg-plus">@include('svg.save-icon')</span>
                <span class="font-15">Save</span>
            </button>
      </div>
    </div>
  </div>
</div>
