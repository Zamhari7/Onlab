@extends('layouts.app')

@section('content')
    {{-- @include('layouts.headers.cards') --}}

    <!-- Header -->
    <div class="header bg-gradient-primary pb-6 pt-5 pt-md-6">
        <div class="container-fluid">
            <div class="header-body">
                <div class="row align-items-center py-4">
                    <div class="col-lg-6 col-7">
                        <h6 class="h2 text-white d-inline-block mb-0">Tugas</h6>
                        <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                            <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                                <li class="breadcrumb-item"><a href="#"><i class="fas fa-home"></i></a></li>
                                {{-- <li class="breadcrumb-item"><a href="#">Tugas</a></li> --}}
                                <li class="breadcrumb-item active" aria-current="page">Tugas</li>
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
                    <form action="{{ route('fileTugas.update-nilai') }}" method="post">
                        @csrf
                        {{-- @method('put') --}}
                        <!-- Card header -->
                        <div class="row align-items-center pt-3">
                            <div class="col-lg-6 col-5">
                                <div class="card-header border-0">
                                    <h3 class="mb-0">Tugas</h3>
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
                                        <th>NBI</th>
                                        <th>Nama Tugas</th>
                                        <th>Waktu Upload</th>
                                        <th>File</th>
                                        <th>Nilai</th>
                                        <th>Feedback</th>
                                        {{-- <th>Aksi</th> --}}
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no = 1; ?>
                                    @foreach ($fileTugas as $fileTugas)
                                        <tr>
                                            <td>{{ $no++ }}</td>
                                            <td hidden>{{ $fileTugas->id }}</td>
                                            <td>{{ $fileTugas->mahasiswa->nbi }}</td>
                                            <td>{{ $fileTugas->tugas->nama_tugas }}</td>
                                            <td>{{ $fileTugas->tgl_upload }}</td>
                                            <td>
                                                {{-- <a href="{{ url('tugas/download/' . $fileTugas->file) }}" class="btn btn-warning">
                                                <i class="fas fa-download"></i></a> --}}
                                                <a href="{{ route('fileTugas.download', ['file_tugas' => $fileTugas->nama_file]) }}"
                                                    class="btn btn-warning">
                                                    <i class="fas fa-download"></i></a>
                                            </td>
                                            <td>
                                                <div class="">
                                                    <input type="hidden" name="id[]" id="id"
                                                        value="{{ $fileTugas->id }}">
                                                    <input type="number" name="nilai[]" id="input-nilai"
                                                        class="form-control form-control-alternative"
                                                        placeholder="Masukan nilai" value="{{ $fileTugas->nilai ?? '0' }}"
                                                        autofocus>

                                                </div>
                                            </td>
                                            <td>
                                                <div class="">
                                                    <input type="hidden" name="id[]" id="id"
                                                        value="{{ $fileTugas->id }}">
                                                    <input type="text" name="keterangan[]" id="input-keterangan"
                                                        class="form-control form-control-alternative"
                                                        placeholder="Berikan feedback"
                                                        value="{{ $fileTugas->keterangan ?? '' }}" autofocus>

                                                </div>
                                            </td>
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
