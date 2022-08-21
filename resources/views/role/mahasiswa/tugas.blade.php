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
                    <!-- Card header -->
                    <div class="row align-items-center">

                    </div>
                    <!-- Light table -->
                    <div class=" table-responsive p-4">
                        <table id="tanpa-print" data-toggle="table" data-pagination="true" data-search="true">
                            <thead>
                                <tr>
                                    <th data-sortable="true">No.</th>
                                    <th>Nama Tugas</th>
                                    <th>Tugas ke-</th>
                                    <th>File</th>
                                    <th>Mulai</th>
                                    <th>Selesai</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 1; ?>
                                @foreach ($tugas as $tugas)
                                    <tr>
                                        <td>{{ $no++ }}</td>
                                        <td>{{ $tugas->nama_tugas }}</td>
                                        <td>{{ $tugas->tugas }}</td>
                                        <td>
                                            <a href="{{ route('tugas.download', ['file' => $tugas->nama_file]) }}"
                                                class="btn btn-warning">
                                                <i class="fas fa-download"></i></a>
                                        </td>
                                        <td>{{ $tugas->mulai }}</td>
                                        <td>{{ $tugas->selesai }}</td>
                                        <td class="row">
                                            <a href="
                                            {{-- {{ route('fileTugas.create') }} --}}
                                            {{ url('fileTugas/' . $tugas->id . '/edit') }}
                                            {{-- {{ url('tugas/' . $tugas->id . '/show') }} --}}
                                            "
                                                class="btn btn-primary">
                                                <i class="fas fa-paper-plane"></i></a>
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
