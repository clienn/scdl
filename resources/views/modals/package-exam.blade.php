<div class="modal fade" id="packageExamModal" tabindex="-1" role="dialog" aria-labelledby="peModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="peModalLabel">Package exams selection</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div id="package-exam-modal" class="modal-body">
        <div class="row">
            <div class="form-group col-md-12">
                <input type="text" class="form-control form-rounded bg-gray-1" id="package-exam-search" placeholder="Enter package or exam name">
            </div>
        </div>
        <div role="tabpanel">
            <!-- Nav tabs -->
            <ul class="nav nav-tabs">
              <li class="nav-item">
                <a class="nav-link active" href="#examListTab" aria-controls="examListTab" role="tab" data-toggle="tab">Exams</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#packageListTab" aria-controls="packageListTab" role="tab" data-toggle="tab">Packages</a>
              </li>
            </ul>
            <!-- Tab panes -->
            <div class="tab-content">
                <div role="tabpanel" class="tab-pane active" id="examListTab">
                  <table id="examTableModal" class="table tb-style-1 table-sm table-hover table-borderless">
                      <thead>
                          <tr class="font-lime font-bold">
                              <th scope="col">&nbsp;</th>
                              <th scope="col">Name</th>
                              <th scope="col">Category</th>
                              <th scope="col">Price</th>
                          </tr>
                      </thead>
                      <tbody class="font-10">
                          @foreach($exams as $exam)
                          <tr>
                              <td scope="row" style="width:10%;"><input type="checkbox" name="exams[]" value="e{{ $exam->id }}" /></td>
                              <td>{{ $exam->name }}</td>
                              <td>{{ $exam->category }}</td>
                              <td>{{ $exam->price }}</td>
                          </tr>
                          @endforeach
                      </tbody>
                  </table>

                  <div id="exam-list-pagination">
                      @include('partials.package-exam-pagination-query')
                  </div>
                </div>
                <div role="tabpanel" class="tab-pane" id="packageListTab">
                  <table id="packageTableModal" class="table tb-style-1 table-sm table-hover table-borderless">
                      <thead>
                          <tr class="font-lime font-bold">
                            <th scope="col">&nbsp;</th>
                            <th scope="col">Name</th>
                            <th scope="col">Discount Type</th>
                            <th scope="col">Discount</th>
                            <th scope="col">Price</th>
                          </tr>
                      </thead>
                      <tbody class="font-10">
                        @foreach($packages as $package)
                            <tr>
                                <td scope="row"><input type="checkbox" name="packages[]" value="p{{ $package->id }}" /></td>
                                <td>{{ $package->name }}</td>
                                <td>{{ $package->discount_type }}</td>
                                <td>{{ $package->discount }}</td>
                                <td>{{ $package->price }}</td>
                            </tr>
                        @endforeach
                      </tbody>
                  </table>

                  <div id="package-list-pagination">
                      @include('partials.package-list-pagination-query')
                  </div>
                </div>
            </div>
        </div>
            
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>