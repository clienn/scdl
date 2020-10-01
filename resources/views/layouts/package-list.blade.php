@extends('layouts.base')

@section('search-bar')
    @include('partials.search-bar')
@stop

@section('db-content')
    <div class="container-fluid font-regular form-wrap">
        <table class="table tb-style-1">
            <thead>
                <tr class="font-lime font-bold">
                    <th scope="col">Code</th>
                    <th scope="col">Name</th>
                    <th scope="col">Discount</th>
                    <th scope="col">Price</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody class="font-10">
                @foreach($data as $package)
                    <tr>
                        <th scope="row">{{ $package->id }}</th>
                        <td>{{ $package->name }}</td>
                        <td>{{ $package->price }}</td>
                        <td>{{ $package->discount }}</td>
                        <td><a href="/package/{{ $package->id }}/registration">Update</a></td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        
        @include('partials.pagination')
        
    </div>
@stop