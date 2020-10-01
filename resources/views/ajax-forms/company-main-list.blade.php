<table class="table tb-style-1">
    <thead>
        <tr class="font-lime font-bold">
            <th scope="col">Company Name</th>
            <th scope="col">Address</th>
            <th scope="col">Contact Person</th>
            <th scope="col">Contact</th>
            <th scope="col">Fax</th>
            <th scope="col">status</th>
            <th scope="col">action</th>
        </tr>
    </thead>
    <tbody class="font-10">
        @foreach($data as $company)
            <tr>
                <td>{{ $company->name }}</td>
                <td>{{ $company->address }}</td>
                <td>{{ $company->contact_person }}</td>
                <td>{{ $company->contact }}</td>
                <td>{{ $company->fax }}</td>
                <td>{{ $company->status }}</td>
                <td><a href="/company/{{ $company->id }}/registration">Update</a></td>
            </tr>
        @endforeach
    </tbody>
</table>

<div id="pagination-list">
    @include('partials.pagination')
</div>