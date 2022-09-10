@extends('layouts.app')
@section('title', 'Progress Pembayaran')

@push('head')
    <link rel="stylesheet" type="text/css" href="{{ asset('bower_components\datatables.net-bs4\css\dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets\pages\data-table\css\buttons.dataTables.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('bower_components\datatables.net-responsive-bs4\css\responsive.bootstrap4.min.css') }}">
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
                        <h4><strong>Progress Pembayaran</strong></h4>
                        <span>Progress Pembayaran</span>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="page-header-breadcrumb">
                    <ul class="breadcrumb-title">
                        <li class="breadcrumb-item">
                            <a href="{{ URL::to('/') }}"> <i class="feather icon-home"></i> </a>
                        </li>
                        <li class="breadcrumb-item"><a href="{{ URL::to('/admin/dprd-kab-kota') }}">Progress Pembayaran</a> </li>
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
                        <h5>Table Progress Pembayaran</h5>
                    </div>
                    <div class="card-body">
                        <form action="{{ URL::to('/export/progress-pembayaran') }}" method="post">
                            @csrf
                            <div class="mb-4">
                                <button class="btn btn-success">
                                    <i class="fa fa-file-excel-o"></i>
                                    Export Excel
                                </button>
                            </div>
                            <div class="my-2">
                                <div class="row">
                                    <div class="col-sm-4 form-group">
                                        <label for="month">Bulan</label>
                                        <select id="month" name="month" class="form-control filter">
                                            <option value="01" {{ date('m') == '01' ? 'selected' : '' }}>Januari</option>
                                            <option value="02" {{ date('m') == '02' ? 'selected' : '' }}>Februari</option>
                                            <option value="03" {{ date('m') == '03' ? 'selected' : '' }}>Maret</option>
                                            <option value="04" {{ date('m') == '04' ? 'selected' : '' }}>April</option>
                                            <option value="05" {{ date('m') == '05' ? 'selected' : '' }}>Mei</option>
                                            <option value="06" {{ date('m') == '06' ? 'selected' : '' }}>Juni</option>
                                            <option value="07" {{ date('m') == '07' ? 'selected' : '' }}>Juli</option>
                                            <option value="08" {{ date('m') == '08' ? 'selected' : '' }}>Agustus</option>
                                            <option value="09" {{ date('m') == '09' ? 'selected' : '' }}>September</option>
                                            <option value="10" {{ date('m') == '10' ? 'selected' : '' }}>Oktober</option>
                                            <option value="11" {{ date('m') == '11' ? 'selected' : '' }}>November</option>
                                            <option value="12" {{ date('m') == '12' ? 'selected' : '' }}>Desember</option>
                                        </select>
                                    </div>
                                    <div class="col-sm-4 form-group">
                                        <label for="year">Tahun</label>
                                        <select id="year" name="year" class="form-control filter">
                                            @for($i = 0; $i < count($years); $i++)
                                                <option value="{{ $years[$i] }}" {{ date('Y') == $years[$i] ? 'selected' : '' }}>{{ $years[$i] }}</option>
                                            @endfor
                                        </select>
                                    </div>
                                    <div class="col-sm-4 form-group">
                                        <label for="member_level_id">Tingkat</label>
                                        <select id="member_level_id" name="member_level_id" class="form-control filter">
                                            <option value="">All</option>
                                            @foreach($member_levels as $member_level)
                                                <option value="{{ $member_level->id }}">{{ $member_level->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </form>
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered table-hover w-100" id="table">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama Anggota</th>
                                        <th>Tingkat</th>
                                        <th>Provinsi</th>
                                        <th>Kab / Kota</th>
                                        <th>Terhubung</th>
                                        <th>Respon</th>
                                        <th>Transfer</th>
                                        <th>Zakat</th>
                                        <th>Infaq</th>
                                        <th>Sedekah</th>
                                        <th>Jumlah</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody></tbody>
                            </table>
                        </div>
                    </div>
                </div>
                @include('components.actions.transaction.edit')
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
    <script type="text/javascript" src="{{ asset('bower_components\select2\js\select2.full.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('bower_components\bootstrap-multiselect\js\bootstrap-multiselect.js') }}"></script>
    <script type="text/javascript" src="{{ asset('bower_components\multiselect\js\jquery.multi-select.js') }}"></script>
    @include($js)
@endpush
