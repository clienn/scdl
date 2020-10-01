<table class="table tb-style-1 table-sm table-hover table-borderless">
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
        @foreach($data as $package)
        <tr>
            <td scope="row" style="width:10%;"><input type="checkbox" name="packages[]" value="{{ $package->id }}" /></td>
            <td>{{ $package->name }}</td>
            <td>{{ $package->discount_type }}</td>
            <td>{{ $package->discount }}</td>
            <td>{{ $package->price }}</td>
        </tr>
        @endforeach
    </tbody>
</table>

<div id="package-list-pagination">
    @include('partials.pagination')
</div>