@extends('layouts.app')

@section('content')
    <!-- Header -->
    <div class="header bg-gradient-primary pb-6 pt-5 pt-md-6">
        <div class="container-fluid">
            <div class="header-body">
                <div class="row align-items-center py-4">
                    <div class="col-lg-6 col-7">

                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid mt--6">
        <div class="col-xl-12 order-xl-1">
            <div class="card bg-secondary shadow">
                <div class="card-header bg-white border-0">
                    <div class="row align-items-center">
                        <h3 class="mb-0">{{ __('Tambah tugas') }}</h3>
                    </div>
                </div>
                <div class="card-body">
                    <form method="post" action="{{ route('tugas.store') }}" autocomplete="off"
                        enctype="multipart/form-data">
                        @csrf

                        {{-- <h6 class="heading-small text-muted mb-4">{{ __('User information') }}</h6> --}}

                        @if (session('status'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                {{ session('status') }}
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        @endif


                        <div class="pl-lg-4">
                            {{-- <div class="form-group{{ $errors->has('id_kelas') ? ' has-danger' : '' }}">
                                <label class="form-control-label" for="input-id_kelas">{{ __('Kode Kelas') }}</label>
                                <select name="id_kelas" id="input-id_kelas"
                                    class="form-control form-control-alternative{{ $errors->has('id_kelas') ? ' is-invalid' : '' }}"
                                    placeholder="" value="" required>
                                    <option disabled="" selected=""> Pilih </option>
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                </select>

                                @if ($errors->has('id_kelas'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('id_kelas') }}</strong>
                                    </span>
                                @endif
                            </div> --}}
                            <div class="form-group{{ $errors->has('id_kelas') ? ' has-danger' : '' }}">
                                <label class="form-control-label" for="input-id_kelas">{{ __('Kelas') }}</label>
                                <select class="form-control" name="id_kelas" id="input-id_kelas" required>
                                    {{-- <option hidden value="{{ $tugas->kelas->id }}">
                                    <option hidden value="{{ $tugas->kelas['id'] }}">
                                        {{ $tugas->kelas->nama_kelas }}</option> --}}
                                    @foreach ($kelas as $kelas)
                                        <option value="{{ $kelas->id }}">{{ $kelas->nama_kelas }}</option>
                                    @endforeach
                                </select>

                                @if ($errors->has('id_kelas'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('id_kelas') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="form-group{{ $errors->has('nama_tugas') ? ' has-danger' : '' }}">
                                <label class="form-control-label" for="input-nama_tugas">{{ __('Nama Tugas') }}</label>
                                <input type="text" name="nama_tugas" id="input-nama_tugas"
                                    class="form-control form-control-alternative{{ $errors->has('nama_tugas') ? ' is-invalid' : '' }}"
                                    placeholder="" value="" required autofocus>

                                @if ($errors->has('nama_tugas'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('nama_tugas') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="form-group{{ $errors->has('tipe') ? ' has-danger' : '' }}">
                                <label class="form-control-label" for="input-tipe">{{ __('Tipe') }}</label>
                                <select name="tipe" id="input-tipe"
                                    class="form-control form-control-alternative{{ $errors->has('tipe') ? ' is-invalid' : '' }}"
                                    placeholder="" value="" required>
                                    <option disabled="" selected=""> Pilih </option>
                                    <!--<option value="Tugas Pendahuluan">Tugas Pendahuluan</option>-->
                                    <option value="Tugas Pendahuluan">Tugas Pendahuluan</option>
                                    <option value="Kegiatan Praktikum">Kegiatan Praktikum</option>
                                    <option value="Ujian">Ujian</option>
                                    <option value="Laporan">Laporan</option>
                                    <option value="Bimbingan">Bimbingan</option>
                                </select>

                                @if ($errors->has('tipe'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('tipe') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="form-group{{ $errors->has('tugas') ? ' has-danger' : '' }}">
                                <label class="form-control-label" for="input-tugas">{{ __('Tugas Ke-') }}</label>
                                <select name="tugas" id="input-tugas"
                                    class="form-control form-control-alternative{{ $errors->has('tugas') ? ' is-invalid' : '' }}"
                                    placeholder="" value="" required>
                                    <option disabled="" selected=""> Pilih </option>
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                </select>

                                @if ($errors->has('tugas'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('tugas') }}</strong>
                                    </span>
                                @endif
                            </div>

                            <div class="form-group{{ $errors->has('mulai') ? ' has-danger' : '' }}">
                                <label class="form-control-label" for="input-mulai">{{ __('Mulai') }}</label>
                                <input type="datetime-local" name="mulai" id="input-mulai"
                                    class="form-control form-control-alternative{{ $errors->has('mulai') ? ' is-invalid' : '' }}"
                                    placeholder="" value="" required>

                                @if ($errors->has('mulai'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('mulai') }}</strong>
                                    </span>
                                @endif
                            </div>

                            <div class="form-group{{ $errors->has('selesai') ? ' has-danger' : '' }}">
                                <label class="form-control-label" for="input-selesai">{{ __('Selesai') }}</label>
                                <input type="datetime-local" name="selesai" id="input-selesai"
                                    class="form-control form-control-alternative{{ $errors->has('selesai') ? ' is-invalid' : '' }}"
                                    placeholder="" value="" required>

                                @if ($errors->has('selesai'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('selesai') }}</strong>
                                    </span>
                                @endif
                            </div>

                            <div class="form-group{{ $errors->has('file') ? ' has-danger' : '' }}">
                                <label class="form-control-label" for="input-file">{{ __('Soal Tugas') }}</label>
                                <input type="file" name="file" id="input-file"
                                    class="form-control form-control-alternative{{ $errors->has('file') ? ' is-invalid' : '' }}"
                                    placeholder="" value="" required>

                                @if ($errors->has('file'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('file') }}</strong>
                                    </span>
                                @endif
                            </div>

                            <div class="text-center">
                                <button type="submit" class="btn btn-success mt-4">{{ __('Tambah') }}</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <br>
    <br>
@endsection
