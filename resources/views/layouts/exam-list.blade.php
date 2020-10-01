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
                    <th scope="col">Category</th>
                    <th scope="col">Price</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody class="font-10">
                @foreach($data as $exam)
                    <tr>
                        <th scope="row">{{ $exam->id }}</th>
                        <td>{{ $exam->name }}</td>
                        <td>{{ $exam->category }}</td>
                        <td>{{ $exam->price }}</td>
                        <td><a href="/exam/{{ $exam->id }}/registration">Update</a></td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        
        @include('partials.pagination')

    </div>
@stop