@extends('layouts.master')

@section('content')
    @include('partials.topbar')
    <div class="container-fluid col-h100">
        <div class="row h-100">
            <div class="col-md-2 h-100">
                <div class="container font-regular menu-wrap">
                    <div class="row mt-2">
                        <div class="col-md-12 flex-column d-flex align-items-center mt-5">
                            <div class="db-icon-wrap bg-gray-1 menu" data="0">
                                @include('svg.db-dashboard')
                            </div>
                            <span class="mt-3 font-10 font-lime">Dashboard</span>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 flex-column d-flex align-items-center mt-3">
                            <div class="db-icon-wrap bg-gray-1 menu" data="1">
                                @include('svg.db-patient')
                            </div>
                            <span class="mt-3 font-10 font-lime">Patient</span>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 flex-column d-flex align-items-center mt-3">
                            <div class="db-icon-wrap bg-gray-1 menu" data="2">
                                @include('svg.db-update-status')
                            </div>
                            <span class="mt-3 font-10 font-lime">Company</span>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 flex-column d-flex align-items-center mt-3">
                            <div class="db-icon-wrap bg-gray-1 menu" data="3">
                                @include('svg.db-cashiering')
                            </div>
                            <span class="mt-3 font-10 font-lime">Cashiering</span>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 flex-column d-flex align-items-center mt-3">
                            <div class="db-icon-wrap bg-gray-1 menu" data="4">
                                @include('svg.db-results')
                            </div>
                            <span class="mt-3 font-10 font-lime">Results</span>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 flex-column d-flex align-items-center mt-5">
                            <a href="/user/0/registration"><span class="mt-3 font-10 font-lime menu-2" data="0">Admin</span></a>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 flex-column d-flex align-items-center mt-1 menu-2" data="1">
                            <span class="mt-3 font-10 font-lime">Reports</span>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 flex-column d-flex align-items-center mt-1 menu-2" data="2">
                            <span class="mt-3 font-10 font-lime">About</span>
                        </div>
                    </div>
                    <div class="row mt-5">
                        <div class="col-md-12 flex-column d-flex align-items-center mt-5">
                            <span class="mt-3 font-10 font-gray-2">SCDL Web Application v.10</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-10 dashboard-content-wrap">
                @yield('search-bar')
                <div class="d-flex flex-column justify-content-center align-items-center font-regular font-black-1 mt-3 db-column-right">
                    @yield('top-panel')
                    <div class="dashboard-content panel-shadow">
                        @yield('db-content')
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop