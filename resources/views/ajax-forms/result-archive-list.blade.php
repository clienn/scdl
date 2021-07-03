<table id="tbl-results-archive" class="tbl-results table tb-style-1 table-sm table-hover table-borderless">
    <thead>
        <tr class="font-lime font-bold">
            <th scope="col">Transaction ID</th>
            <th scope="col">Patient Name</th>
            <th scope="col">Status</th>
            <th scope="col">Transaction Date</th>
            
        </tr>
    </thead>
    <tbody class="font-10">
        @foreach($archive as $item)
            <tr data-exams="{{ $item->exams }}" data-packages="{{ $item->packages }}">
                <input type="hidden" value="{{ $item->exam_result }}" />
                <td>
                    {{ $item->id }}
                </td>
                <td>{{ $item->lastname }}, {{ $item->firstname }} {{ ucfirst($item->middlename)[0] }}.</td>
                @if($item->status == 0)
                    <td><span class="font-gray-4 font-bold">Pending</span></td>
                @elseif($item->status == 1)
                    <td><span class="font-blue-1 font-bold">Active</span></td>
                @elseif($item->status == 2)
                    <td><span class="font-lime font-bold">Complete</span></td>
                @endif
                <th scope="row">{{ $item->updated_at }}</th>
            </tr>
        @endforeach
    </tbody>
</table>

<div id="patient-list-pagination">
    
</div>