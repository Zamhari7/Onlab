@extends('layouts.app')

@section('content')
    {{-- @include('layouts.headers.cards') --}}

    <!-- Header -->
    <div class="header bg-gradient-primary mb-3 pb-6 pt-5 pt-md-6">
        <div class="container-fluid">
            <div class="header-body">
                <div class="row align-items-center py-4">
                    <div class="col-lg-12 col-12">
                        {{-- <h6 class="h2 text-white d-inline-block mb-0">Dashboard</h6> --}}
                        {{-- <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                            <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                                <li class="breadcrumb-item"><a href="#"><i class="fas fa-home"></i></a></li>
                                <li class="breadcrumb-item"><a href="#">Data Master</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Aslab</li>
                            </ol>
                        </nav> --}}
                        <div class="alert alert-warning alert-dismissible fade show" role="alert">
                            Hi <strong>{{ auth()->user()->name }}</strong>, Silahkan ganti password akun di pengaturan
                            demi keamanan akun
                            anda!
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid mt--7">
        <div class="row">
            <div class="col-xl-12">
                <div class="card shadow">
                    <div class="card-header bg-transparent">
                        <div class="row align-items-center">
                            <div class="col">
                                <h6 class="text-uppercase text-muted ls-1 mb-1"></h6>
                                <h2 class="mb-0">Informasi Praktikum</h2>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="card-body col-xl-6">
                            <!-- Chart -->
                            <div class="">
                                <div class="card card-stats mb-4 mb-xl-0">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col">
                                                <h4 class=" text-uppercase font-weight-bold text-muted">Laboratorium
                                                </h4>
                                                <h4 class=" text-uppercase font-weight-bold">Desain Komputer</h4>

                                            </div>
                                            <div class="col-auto">
                                                <div class="icon icon-shape bg-purple text-white rounded-circle shadow">
                                                    <i class="fas fa-warehouse"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="mt-4">
                                <div class="card card-stats mb-4 mb-xl-0">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col">
                                                <h4 class=" text-uppercase font-weight-bold text-muted">Praktikum
                                                </h4>
                                                <h4 class=" text-uppercase font-weight-bold">Pemrograman Teknologi Web</h4>

                                            </div>
                                            <div class="col-auto">
                                                <div class="icon icon-shape bg-blue text-white rounded-circle shadow">
                                                    <i class="fas fa-desktop"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="mt-4">
                                <div class="card card-stats mb-4 mb-xl-0">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col">
                                                <h4 class=" text-uppercase font-weight-bold text-muted">Kelas Praktikum</h4>
                                                <h4 class=" text-uppercase font-weight-bold">{{ $kelas->nama_kelas }}</h4>

                                            </div>
                                            <div class="col-auto">
                                                <div class="icon icon-shape bg-green text-white rounded-circle shadow">
                                                    <i class="ni ni-ruler-pencil"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-body col-xl-6">
                            <!-- Chart -->
                            <div class="">
                                <div class="card card-stats mb-4 mb-xl-0">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col">
                                                <h4 class=" text-uppercase font-weight-bold text-muted">Dosen Pembimbing
                                                </h4>
                                                <h4 class=" text-uppercase font-weight-bold">{{ $dosbim->nama_dosbim }}
                                                </h4>

                                            </div>
                                            <div class="col-auto">
                                                <div class="icon icon-shape bg-purple text-white rounded-circle shadow">
                                                    <i class="fas fa-user-tie"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="mt-4">
                                <div class="card card-stats mb-4 mb-xl-0">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col">
                                                <h4 class=" text-uppercase font-weight-bold text-muted">No. Telpon Dosbim
                                                </h4>
                                                <h4 class=" text-uppercase font-weight-bold">{{ $dosbim->no_hp }}</h4>

                                            </div>
                                            <div class="col-auto">
                                                <div class="icon icon-shape bg-blue text-white rounded-circle shadow">
                                                    <i class="fas fa-phone"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="mt-4">
                                <div class="card card-stats mb-4 mb-xl-0">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col">
                                                <h4 class=" text-uppercase font-weight-bold text-muted">Nilai Akhir</h4>
                                                <h4 class=" text-uppercase font-weight-bold">_</h4>

                                            </div>
                                            <div class="col-auto">
                                                <div class="icon icon-shape bg-green text-white rounded-circle shadow">
                                                    <i class="fas fa-marker"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        {{-- @include('layouts.footers.auth') --}}
    </div>
@endsection

@push('js')
    <script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.min.js"></script>
    <script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.extension.js"></script>
@endpush
