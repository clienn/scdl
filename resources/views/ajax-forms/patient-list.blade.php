<table class="table tb-style-1 table-sm table-hover table-borderless">
    <thead>
        <tr class="font-lime font-bold">
            <th scope="col">Code</th>
            <th scope="col">Lastname</th>
            <th scope="col">Firstname</th>
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