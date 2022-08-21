@extends('layouts.app')

@section('content')
    {{-- @include('layouts.headers.cards') --}}

    <!-- Header -->
    <div class="header bg-gradient-primary pb-6 pt-5 pt-md-6">
        <div class="container-fluid">
            <div class="header-body">
                <div class="row align-items-center py-4">
                    <div class="col-lg-6 col-7">
                        <h6 class="h2 text-white d-inline-block mb-0">Nilai</h6>
                        <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                            <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                                <li class="breadcrumb-item"><a href="#"><i class="fas fa-home"></i></a></li>
                                {{-- <li class="breadcrumb-item"><a href="#">Tugas</a></li> --}}
                                <li class="breadcrumb-item active" aria-current="page">Nilai</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Page content -->
    <div class="container-fluid mt--6">
        <div class="row">
            <div class="col">
                <div class="card">
                    <!-- Card header -->
                    <div class="row align-items-center pt-3">
                        <div class="col-lg-6 col-5">
                            <div class="card-header border-0">
                                <h3 class="mb-0">Nilai</h3>
                            </div>
                        </div>
                        <div class="col-lg-6 col-5 text-right">
                        </div>
                    </div>
                    <!-- Light table -->
                    <div class=" table-responsive p-4">
                        <table id="tanpa-print" data-toggle="table" data-pagination="true" data-search="true">
                            <thead>
                                <tr>
                                    <th data-sortable="true">No.</th>
                                    <th>Nama Kelas</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 1; ?>
                                @foreach ($kelas as $kelas)
                                    <tr>
                                        <td>{{ $no++ }}</td>
                                        <td>
                                            {{ $kelas->nama_kelas }}
                                        </td>
                                        <td class="row">
                                            <a href="
                                            {{ url('nilai/' . $kelas->id) }}
                                            "
                                                class="btn btn-primary">
                                                {{-- <i class="fas fa-eye"> --}}
                                                </i>Detail</a>

                                            <a href="
                                            {{ url('nilaiTotal/' . $kelas->id) }}
                                            "
                                                class="btn btn-primary">
                                                {{-- <i class="fas fa-eye"> --}}
                                                </i>Total</a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>
    </div>

    </div>
@endsection
