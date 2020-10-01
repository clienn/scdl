<div class="row">
    <div class="col-md-12">
        <span class="font-20 font-bold">Package: {{ $package_info[0]->name }}</span>
    </div>
</div>

<table class="table tb-style-1 table-sm table-hover table-borderless">
    <thead>
        <tr class="font-lime font-bold">
            <th scope="col">Name</th>
            <th scope="col">Price</th>
        </tr>
    </thead>
    <tbody class="font-10">
        @foreach($package as $exam)
            <tr>
                <td>{{ $exam->exam }}</td>
                <td>{{ $exam->exam_price }}</td>
            </tr>
        @endforeach
            <tr><td colspan="2"><div class="col-md-12 border-bottom-1 mb-1"></div></td></tr>
            <tr class="font-bold">
                <td>Original Price:</td>
                <td>{{$package_info[0]->discount_type == 1 ? number_format($package_info[0]->price / ((100 - $package_info[0]->discount) / 100), 2, '.', '') : number_format($package_info[0]->price + $package_info[0]->discount, 2, '.', '') }}</td>
            </tr>
            <tr class="font-bold">
                <td>Discount ({{$package_info[0]->discount_type == 1 ? '%' : 'Fixed' }}):</td>
                <td>{{ $package_info[0]->discount }}</td>
            </tr>
            <tr class="font-bold">
                <td>Total:</td>
                <td>{{ $package_info[0]->price }}</td>
            </tr>
    </tbody>
</table>