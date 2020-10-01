<div class="modal fade" id="patient-search-modal" tabindex="-1" role="dialog" aria-labelledby="psModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="psModalLabel">Patient Search</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="row">
            <div class="form-group col-md-12">
                <input type="text" class="form-control form-rounded bg-gray-1" id="patient-search" placeholder="Enter patient name or company name">
            </div>
        </div>
        <div id="search-patient-modal">     
            <table class="table tb-style-1 table-hover">
                <thead>
                    <tr class="font-lime font-bold">
                        <th scope="col">Code</th>
                        <th scope="col">Lastname</th>
                        <th scope="col">Firstname</th>
                        <th scope="col">Middlename</th>
                        <th scope="col">Gender</th>
                    </tr>
                </thead>
                <tbody class="font-10">
                    @foreach($patients as $patient)
                    <tr>
                        <td scope="row" style="width:10%;">{{ $patient->id }}</td>
                        <td>{{ $patient->lastname }}</td>
                        <td>{{ $patient->firstname }}</td>
                        <td>{{ $patient->middlename }}</td>
                        <td>{{ $patient->gender }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <div id="patient-list-pagination">
                @include('partials.patient-pagination-query')
            </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn form-btn-3 font-black-1" id="btn-close-patient-search" data-dismiss="modal">
            <span class="font-15">Close</span>
        </button>
        <button type="button" id="btn-confirm_patient_selection" class="btn form-btn-2 bg-lime-1">
            <span class="svg-plus">@include('svg.plus')</span>
            <span class="font-15">Confirm Selection</span>
        </button>
      </div>
    </div>
  </div>
</div>
