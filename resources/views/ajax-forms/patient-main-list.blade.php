<table class="table tb-style-1">
    <thead>
        <tr class="font-lime font-bold">
            <th scope="col">Patient Code</th>
            <th scope="col">Lastname</th>
            <th scope="col">Firstname</th>
            <th scope="col">Middlename</th>
            <th scope="col">Gender</th>
            <th scope="col">Birthdate</th>
            <th scope="col">Action</th>
        </tr>
    </thead>
    <tbody class="font-10">
        @foreach($data as $patient)
            <tr>
                <th scope="row">{{ $patient->id }}</th>
                <td>{{ $patient->lastname }}</td>
                <td>{{ $patient->firstname }}</td>
                <td>{{ $patient->middlename }}</td>
                <td>{{ $patient->gender }}</td>
                <td>{{ $patient->birthdate }}</td>
                <td>
                    <a href="/patient/{{ $patient->id }}/registration">Update</a> | 
                    <a href="/doctor/form/{{ $patient->id }}/0">Form</a>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>

<div id="pagination-list">
    @include('partials.pagination')
</div>