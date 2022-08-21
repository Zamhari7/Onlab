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
                    <div class="row align-items-center pt-3">
                        <div class="col-lg-6 col-5">
                            <div class="card-header border-0">
                                <h3 class="mb-0">
                                    {{-- {{ $tugas->nama_tugas }} --}}
                                </h3>
                            </div>
                        </div>
                    </div>
                    <!-- Light table -->
                    <div class=" table-responsive p-4">
                        <table id="tanpa-print" data-toggle="table" data-pagination="true" data-search="true">
                            <thead>
                                <tr>
                                    <th data-sortable="true">No.</th>
                                    <th>Nbi</th>
                                    <th>Waktu upload</th>
                                    <th>File</th>
                                    <th>Nilai</th>
                                </tr>
                            </thead>
                            <tbody>
                                {{-- <?php $no = 1; ?>
                                @foreach ($tugas as $tugas)
                                    <tr>
                                        <td>{{ $no++ }}</td>
                                        <td>{{ $tugas->nbi }}</td>
                                        <td>{{ $tugas->upload }}</td>
                                        <td>
                                            <a href="{{ route('tugas.download', ['file' => $tugas->nama_file]) }}"
                                                class="btn btn-warning">
                                                <i class="fas fa-download"></i></a>
                                        </td>
                                        <td>
                                            <div class="form-group{{ $errors->has('nilai') ? ' has-danger' : '' }}">
                                                <label class="form-control-label"
                                                    for="input-nilai">{{ __('Nama Tugas') }}</label>
                                                <input type="text" name="nilai" id="input-nilai"
                                                    class="form-control form-control-alternative{{ $errors->has('nilai') ? ' is-invalid' : '' }}"
                                                    placeholder="" value="{{ $tugas->nilai }}" required autofocus>

                                                @if ($errors->has('nilai'))
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $errors->first('nilai') }}</strong>
                                                    </span>
                                                @endif
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach --}}
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>
    </div>

    </div>
@endsection
