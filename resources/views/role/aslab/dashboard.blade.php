@extends('layouts.app')

@section('content')
    @include('layouts.headers.cards')

    <div class="container-fluid mt--7">
        <div class="row">
            {{-- <div class="col-xl-8 mb-5 mb-xl-0">
                <div class="card bg-gradient-default shadow">
                    <div class="card-header bg-transparent">
                        <div class="row align-items-center">
                            <div class="col">
                                <h6 class="text-uppercase text-light ls-1 mb-1">Total</h6>
                                <h2 class="text-white mb-0">Tugas Terkumpul</h2>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <!-- Chart -->
                        <div class="chart">
                            <!-- Chart wrapper -->
                            <canvas id="chart-sales" class="chart-canvas"></canvas>
                        </div>
                    </div>
                </div>
            </div> --}}

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
                            <div class="">
                                <div class="card card-stats mb-4 mb-xl-0">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col">
                                                <h4 class=" text-uppercase font-weight-bold text-muted">Total Dosen
                                                    Pembimbing
                                                </h4>
                                                <h4 class=" text-uppercase font-weight-bold">{{ $dosbim->count('id') }}
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
                                                <h4 class=" text-uppercase font-weight-bold text-muted">Total Assisten
                                                    Laboratorium
                                                </h4>
                                                <h4 class=" text-uppercase font-weight-bold">{{ $aslab->count('id') }}
                                                </h4>

                                            </div>
                                            <div class="col-auto">
                                                <div class="icon icon-shape bg-blue text-white rounded-circle shadow">
                                                    <i class="fas fa-user-friends"></i>
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
                                                <h4 class=" text-uppercase font-weight-bold text-muted">Total Mahasiswa</h4>
                                                <h4 class=" text-uppercase font-weight-bold">{{ $mahasiswa->count('id') }}
                                                </h4>

                                            </div>
                                            <div class="col-auto">
                                                <div class="icon icon-shape bg-green text-white rounded-circle shadow">
                                                    <i class="fas fa-users"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-body col-xl-6">
                            <div class="">
                                <div class="card card-stats mb-4 mb-xl-0">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col">
                                                <h4 class=" text-uppercase font-weight-bold text-muted">Tugas Pendahuluan
                                                </h4>
                                                <h4 class=" text-uppercase font-weight-bold">
                                                    {{ $pendahuluan->count('id') }} File belum dinilai</h4>

                                            </div>
                                            <div class="col-auto">
                                                <div class="icon icon-shape bg-purple text-white rounded-circle shadow">
                                                    <i class="fas fa-exclamation"></i>
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
                                                <h4 class=" text-uppercase font-weight-bold text-muted">Kegiatan Praktikum
                                                </h4>
                                                <h4 class=" text-uppercase font-weight-bold">{{ $kegiatan->count('id') }}
                                                    File belum dinilai</h4>

                                            </div>
                                            <div class="col-auto">
                                                <div class="icon icon-shape bg-blue text-white rounded-circle shadow">
                                                    <i class="fas fa-exclamation"></i>
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
                                                <h4 class=" text-uppercase font-weight-bold text-muted">Ujian
                                                </h4>
                                                <h4 class=" text-uppercase font-weight-bold">{{ $ujian->count('id') }}
                                                    File belum dinilai</h4>

                                            </div>
                                            <div class="col-auto">
                                                <div class="icon icon-shape bg-green text-white rounded-circle shadow">
                                                    <i class="fas fa-exclamation"></i>
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

            {{-- <div class="col-xl-6">
                <div class="card shadow">
                    <div class="card-header bg-transparent">
                        <div class="row align-items-center">
                            <div class="col">
                                <h6 class="text-uppercase text-muted ls-1 mb-1">Total tugas</h6>
                                <h2 class="mb-0">Belum dinilai</h2>
                            </div>
                        </div>
                    </div>
                    <div class="card-body ">
                        <!-- Chart -->
                        <div class="">
                            <div class="card card-stats mb-4 mb-xl-0">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col">
                                            <h4 class=" text-uppercase font-weight-bold">Tugas</h4>
                                            <h4 class=" text-uppercase font-weight-bold">Pendahuluan</h4>

                                        </div>
                                        <div class="col-auto">
                                            <div class="icon icon-shape bg-yellow text-white rounded-circle shadow">
                                                <span class="h2 font-weight-bold mb-0">0</span>
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
                                            <h4 class=" text-uppercase font-weight-bold">Tugas</h4>
                                            <h4 class=" text-uppercase font-weight-bold">Kegiatan</h4>

                                        </div>
                                        <div class="col-auto">
                                            <div class="icon icon-shape bg-pink text-white rounded-circle shadow">
                                                <span class="h2 font-weight-bold mb-0">0</span>
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
                                            <h4 class=" text-uppercase font-weight-bold">Laporan</h4>
                                            <h4 class=" text-uppercase font-weight-bold"> </h4>

                                        </div>
                                        <div class="col-auto">
                                            <div class="icon icon-shape bg-info text-white rounded-circle shadow">
                                                <span class="h2 font-weight-bold mb-0">0</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div> --}}

        </div>


        {{-- @include('layouts.footers.auth') --}}
    </div>
@endsection

@push('js')
    <script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.min.js"></script>
    <script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.extension.js"></script>
@endpush
