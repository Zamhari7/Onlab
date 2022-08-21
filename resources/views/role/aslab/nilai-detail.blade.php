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
                    <form action="{{ route('nilai.simpan-nilai') }}" method="post">
                        @csrf
                        <!-- Card header -->
                        <div class="row align-items-center pt-3">
                            <div class="col-lg-6 col-5">
                                <div class="card-header border-0">
                                    <h3 class="mb-0">Nilai</h3>
                                </div>
                            </div>
                            <div class="col-lg-6 col-5 text-right">

                                <button class="right btn btn-primary mr-4" type="submit">
                                    <span class="text-white"></i></span>
                                    <span class="text-white">Simpan Data</span>
                                </button>
                            </div>
                        </div>
                        <!-- Light table -->
                        <div class=" table-responsive p-4">
                            <table id="tanpa-print" data-toggle="table" data-pagination="true" data-search="true">
                                <thead>
                                    <tr>
                                        <th data-sortable="true">No.</th>
                                        <th>Nama</th>
                                        <th>NBI</th>
                                        <th>Pend 1</th>
                                        <th>Keg 1</th>
                                        <th>Pend 2</th>
                                        <th>Keg 2</th>
                                        <th>Pend 3</th>
                                        <th>Keg 3</th>
                                        <th>Pend 4</th>
                                        <th>Keg 4</th>
                                        {{-- <th>Ujian</th>
                                        <th>Dosbim</th>
                                        <th>Laporan</th> --}}
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no = 1; ?>
                                    @foreach ($mahasiswa as $mahasiswa)
                                        <tr>
                                            <td>{{ $no++ }}</td>
                                            <td>{{ $mahasiswa->nama_mhs }}</td>
                                            <td>{{ $mahasiswa->nbi }}</td>
                                            <td><input type="text" name="tp1[]" class="form-control "
                                                    value="{{ $myThis->showNilai($mahasiswa->id, 'Tugas Pendahuluan', '1') ?? '0' }}"
                                                    readonly>
                                            </td>
                                            <td><input type="text" name="tk1[]" class="form-control "
                                                    value="{{ $myThis->showNilai($mahasiswa->id, 'Kegiatan Praktikum', '1') ?? '0' }}"
                                                    readonly>
                                            </td>
                                            <td><input type="text" name="tp2[]" class="form-control "
                                                    value="{{ $myThis->showNilai($mahasiswa->id, 'Tugas Pendahuluan', '2') ?? '0' }}"
                                                    readonly>
                                            </td>
                                            <td><input type="text" name="tk2[]" class="form-control "
                                                    value="{{ $myThis->showNilai($mahasiswa->id, 'Kegiatan Praktikum', '2') ?? '0' }}"
                                                    readonly>
                                            </td>
                                            <td><input type="text"name="tp3[]" class="form-control "
                                                    value="{{ $myThis->showNilai($mahasiswa->id, 'Tugas Pendahuluan', '3') ?? '0' }}"
                                                    readonly>
                                            </td>
                                            <td><input type="text"name="tk3[]" class="form-control "
                                                    value="{{ $myThis->showNilai($mahasiswa->id, 'Kegiatan Praktikum', '3') ?? '0' }}"
                                                    readonly>
                                            </td>
                                            <td><input type="text" name="tp4[]" class="form-control "
                                                    value="{{ $myThis->showNilai($mahasiswa->id, 'Tugas Pendahuluan', '4') ?? '0' }}"
                                                    readonly>
                                            </td>
                                            <td><input type="text" name="tk4[]" class="form-control"
                                                    value="{{ $myThis->showNilai($mahasiswa->id, 'Kegiatan Praktikum', '4') ?? '0' }}"
                                                    readonly>
                                            </td>
                                            <input type="hidden" name="id_mahasiswa[]" value="{{ $mahasiswa->id }}">
                                            <input type="hidden" name="id_kelas[]" value="{{ $kelas->id }}">

                                            {{-- <td>
                                                <div class="">
                                                    <input type="hidden" name="id[]" id="id"
                                                        value="{{ $nilai->id }}">
                                                    <input type="number" name="nilai[]" id="input-nilai"
                                                        class="form-control form-control-alternative"
                                                        placeholder="Masukan nilai"
                                                        value="{{ $mahasiswa->nilai->nilai_dosen ?? '0' }}" autofocus>
                                                </div>
                                            </td> --}}
                                            {{-- <td>{{ $mahasiswa->nilai->laporan }}</td> --}}
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    </div>
@endsection
