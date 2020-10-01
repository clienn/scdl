<div class="modal fade" id="patient-registration-modal" tabindex="-1" role="dialog" aria-labelledby="prModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="prModalLabel">Quick Patient Registration</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">   
        <form method="post" action="/cashiering/patient/save">  
        {{ csrf_field() }}
        <div class="container-fluid font-regular form-wrap">
            
                
                <!-- General Info -->
                <div class="row">
                    <div class="col-md-12 flex-column d-flex">
                        <div class="container-fluid">
                            <div class="row mt-4">
                                <div class="col-md-6">
                                    <input type="text" name="lastname" class="form-control-1 form-rounded form-input-1 font-16" placeholder="Lastname">
                                </div>
                                <div class="col-md-6">
                                    <input type="text" name="firstname" class="form-control-1 form-rounded form-input-1 font-16" placeholder="Firstname">
                                </div>
                            </div>
                            <div class="row mt-4">
                                <div class="col-md-6">
                                    <input type="text" name="middlename" class="form-control-1 form-rounded form-input-1 font-16" placeholder="Middlename">
                                </div>
                                <div class="col-md-6">
                                    <select name="gender" class="form-control-1 form-rounded form-select-1 font-16">
                                        <option hidden><span class="font-gray-3">Gender</span></option>
                                        <option value="male">Male</option>
                                        <option value="female">Female</option>
                                    </select>    
                                </div>
                                
                            </div>

                            <div class="row mt-4">
                                <div class="col-md-6">
                                    <input type="text" name="birthdate" autocomplete="off" class="form-control-1 form-rounded form-input-1 font-16 datepicker" placeholder="Date of Birth">
                                </div>
                                <div class="col-md-6">
                                    <select name="company_id" class="form-control-1 form-rounded form-select-1 font-16">
                                        <option hidden><span class="font-gray-3">Company</span></option>
                                        <option value="0">Walk-In</option>
                                        @foreach($companies as $company)
                                          <option value="{{ $company->id }}">{{ $company->name }}</option>
                                        @endforeach
                                    </select>    
                                </div>
                            </div>
                            
                        </div>
                    </div>
                </div>
            
        </div>
            
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save</button>
      </div>
    </div>
    </form>
  </div>
</div>
