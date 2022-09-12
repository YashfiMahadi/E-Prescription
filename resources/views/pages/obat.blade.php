@extends('layouts.app')
@section('title', 'Obat')

@push('head')
    <link rel="stylesheet" type="text/css" href="{{ asset('bower_components\datatables.net-bs4\css\dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets\pages\data-table\css\buttons.dataTables.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets\pages\data-table\extensions\buttons\css\buttons.dataTables.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('bower_components\select2\css\select2.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('bower_components\bootstrap-multiselect\css\bootstrap-multiselect.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('bower_components\multiselect\css\multi-select.css') }}">
@endpush

@section('content')
    <!-- Page-header start -->
    <div class="page-header">
        <div class="row align-items-end">
            <div class="col-lg-8">
                <div class="page-header-title">
                    <div class="d-inline">
                        <h4><strong>Obat</strong></h4>
                        <span>Data obat</span>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="page-header-breadcrumb">
                    <ul class="breadcrumb-title">
                        <li class="breadcrumb-item">
                            <a href="{{ URL::to('/admin') }}"> <i class="feather icon-home"></i> </a>
                        </li>
                        <li class="breadcrumb-item"><a href="{{ URL::to('/admin/Obat') }}">Obat</a> </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- Page-header end -->

    <div class="page-body">
        <div class="row">
            <div class="col-sm-12">
                <div class="card" id="tableCard">
                    <div class="card-header bg-default">
                        <div class="d-flex justify-content-between">
                            <h5>Table Obat</h5>
                        </div>
                    </div>
                    <div class="card-body">
                        <form method="post" id="createForm">
                            <div class="row">
                                <div class="col-md-6">
                                </div>
                                <div class="col-md-6 text-right">
                                    <button type="button" class="btn btn-secondary" id="racikan">
                                        <i class="icofont icofont-test-bulb" style="font-size: 1.2rem"></i>
                                        Racikan
                                    </button>
                                    <button type="button" class="btn btn-success" id="simpanObat">
                                        <i class="ti-save" style="font-size: 1.2rem"></i>
                                        Simpan obat
                                    </button>
                                </div>
                            </div>
                            <div class="table-responsive my-3">
                                <table class="table table-striped" id="table">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Kode</th>
                                            <th>Nama</th>
                                            <th>Stok</th>
                                            <th>Tanggal Dibuat</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                        <tbody>
                                        </tbody>
                                </table>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @include('components.columns.obat.modalNonRacikan')

@endsection

@push('script')
    <script src="{{ asset('bower_components\datatables.net\js\jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('bower_components\datatables.net-buttons\js\dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('assets\pages\data-table\js\jszip.min.js') }}"></script>
    <script src="{{ asset('assets\pages\data-table\js\pdfmake.min.js') }}"></script>
    <script src="{{ asset('assets\pages\data-table\js\vfs_fonts.js') }}"></script>
    <script src="{{ asset('assets\pages\data-table\extensions\buttons\js\dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('assets\pages\data-table\extensions\buttons\js\buttons.flash.min.js') }}"></script>
    <script src="{{ asset('assets\pages\data-table\extensions\buttons\js\jszip.min.js') }}"></script>
    <script src="{{ asset('assets\pages\data-table\extensions\buttons\js\vfs_fonts.js') }}"></script>
    <script src="{{ asset('assets\pages\data-table\extensions\buttons\js\buttons.colVis.min.js') }}"></script>
    <script src="{{ asset('bower_components\datatables.net-buttons\js\buttons.print.min.js') }}"></script>
    <script src="{{ asset('bower_components\datatables.net-buttons\js\buttons.html5.min.js') }}"></script>
    <script src="{{ asset('bower_components\datatables.net-bs4\js\dataTables.bootstrap4.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('bower_components\select2\js\select2.full.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('bower_components\bootstrap-multiselect\js\bootstrap-multiselect.js') }}"></script>
    <script type="text/javascript" src="{{ asset('bower_components\multiselect\js\jquery.multi-select.js') }}"></script>
    @include($js)
@endpush
