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