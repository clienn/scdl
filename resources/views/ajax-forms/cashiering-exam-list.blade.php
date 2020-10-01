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