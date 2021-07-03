<div class="modal fade" id="examTypeModal" tabindex="-1" role="dialog" aria-labelledby="examTypeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="examTypeModalLabel">Exam Type Selection</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="row">
            <div class="form-group col-md-12">
                <input type="text" class="form-control form-rounded bg-gray-1" id="exam-type-search" placeholder="Enter exam type name">
            </div>
        </div>
        <div id="exam-type-list-modal">
            <table id="tbl-exam-types-modal" class="table tb-style-1 table-sm table-hover table-borderless">
                <thead>
                    <tr class="font-lime font-bold">
                        <th scope="col">&nbsp;</th>
                        <th scope="col">Description</th>
                    </tr>
                </thead>
                <tbody class="font-10">
                    @foreach($data as $exam_type)
                    <tr>
                        <td scope="row" style="width:10%;"><input type="checkbox" name="exams[]" value="{{ $exam_type->id }}" /></td>
                        <td>{{ $exam_type->description }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>

            <div id="exam-type-list-pagination">
                @include('partials.pagination')
            </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>