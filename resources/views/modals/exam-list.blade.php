<div class="modal fade" id="examModal" tabindex="-1" role="dialog" aria-labelledby="examModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="examModalLabel">Package exams selection</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div id="exam-list-modal" class="modal-body">
            <table class="table tb-style-1 table-sm table-hover table-borderless">
                <thead>
                    <tr class="font-lime font-bold">
                        <th scope="col">&nbsp;</th>
                        <th scope="col">Name</th>
                        <th scope="col">Category</th>
                        <th scope="col">Price</th>
                    </tr>
                </thead>
                <tbody class="font-10">
                    @foreach($data as $exam)
                    <tr>
                        <td scope="row" style="width:10%;"><input type="checkbox" name="exams[]" value="{{ $exam->id }}" /></td>
                        <td>{{ $exam->name }}</td>
                        <td>{{ $exam->category }}</td>
                        <td>{{ $exam->price }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>

            <div id="exam-list-pagination">
                @include('partials.pagination')
            </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>