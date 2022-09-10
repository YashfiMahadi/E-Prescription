@extends('layouts.app')
@section('title', 'Kateogri')

@push('head')
    <link rel="stylesheet" type="text/css" href="{{ asset('bower_components\datatables.net-bs4\css\dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets\pages\data-table\css\buttons.dataTables.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('bower_components\datatables.net-responsive-bs4\css\responsive.bootstrap4.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets\pages\data-table\extensions\buttons\css\buttons.dataTables.min.css') }}">
@endpush

@section('content')
    <!-- Page-header start -->
    <div class="page-header">
        <div class="row align-items-end">
            <div class="col-lg-8">
                <div class="page-header-title">
                    <div class="d-inline">
                        <h4><strong>Kateogri</strong></h4>
                        <span>Master Data Kateogri</span>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="page-header-breadcrumb">
                    <ul class="breadcrumb-title">
                        <li class="breadcrumb-item">
                            <a href="{{ URL::to('/') }}"> <i class="feather icon-home"></i> </a>
                        </li>
                        <li class="breadcrumb-item"><a href="{{ URL::to('/admin/kategori') }}">Kateogri</a> </li>
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
                        <h5>Table Kateogri</h5>
                        <div class="card-header-right">
                            <ul class="list-unstyled card-option">
                                <li>
                                    <a href="javascript:void(0)" id="create" data-toggle="tooltip" data-placement="top" title="Tambah Data">
                                        <i class="fa fa-plus-square text-success" style="font-size: 1.8rem"></i>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="mb-4">
                            <a href="{{ URL::to('/admin/kategori/export') }}" class="btn btn-success">
                                <i class="fa fa-file-excel-o"></i>
                                Export Excel
                            </a>
                            <a href="javascript:void(0)" class="btn btn-success" id="import">
                                <i class="fa fa-file-excel-o"></i>
                                Import Excel
                            </a>
                        </div>
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered table-hover w-100" id="table">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama Anggota</th>
                                        <th>Deskripsi</th>
                                        <th>action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                @include('components.actions.masterData.category.create')
                @include('components.actions.masterData.category.edit')
                @include('components.modals.masterData.category.table')
                @include('components.modals.masterData.category.import')
            </div>
        </div>
    </div>
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
    <script src="{{ asset('bower_components\datatables.net-responsive\js\dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('bower_components\datatables.net-responsive-bs4\js\responsive.bootstrap4.min.js') }}"></script>
    @include($js)
@endpush
