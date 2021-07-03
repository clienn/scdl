<table class="table tb-style-1">
    <thead>
        <tr class="font-lime font-bold">
            <th scope="col">Code</th>
            <th scope="col">Description</th>
            <th scope="col">Normal Values</th>
            <th scope="col">Input Type</th>
            <th scope="col">Action</th>
        </tr>
    </thead>
    <tbody class="font-10">
        @foreach($data as $exam)
            <tr>
                <th scope="row">{{ $exam->id }}</th>
                <td>{{ $exam->description }}</td>
                <td>{{ $exam->normal_values }}</td>
                <td>
                    @if($exam->type == 0)
                        Input Box
                    @elseif($exam->type == 1)
                        Select Choices
                    @else
                        Textarea
                    @endif    
                </td>
                <td>
                    <a href="/exam_type/{{ $exam->id }}/registration">Update</a> | 
                    <a class="delete-exam-item" href="/exam_type/{{ $exam->id }}/delete">Delete</a>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>

<div id="exam-type-list-pagination">
    @include('partials.pagination')
</div>