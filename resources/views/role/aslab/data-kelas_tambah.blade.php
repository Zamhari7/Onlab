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
                        <h3 class="mb-0">{{ __('Tambah data kelas') }}</h3>
                    </div>
                </div>
                <div class="card-body">
                    <form method="post" action="{{ route('kelas.store') }}" autocomplete="off">
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
                            <div class="form-group{{ $errors->has('nama_kelas') ? ' has-danger' : '' }}">
                                <label class="form-control-label" for="input-nama_kelas">{{ __('Nama kelas') }}</label>
                                <input type="text" name="nama_kelas" id="input-nama_kelas"
                                    class="form-control form-control-alternative{{ $errors->has('nama_kelas') ? ' is-invalid' : '' }}"
                                    placeholder="" value="" required autofocus>

                                @if ($errors->has('nama_kelas'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('nama_kelas') }}</strong>
                                    </span>
                                @endif
                            </div>
                            {{-- <div class="form-group{{ $errors->has('praktikum') ? ' has-danger' : '' }}">
                                <label class="form-control-label" for="input-praktikum">{{ __('Nama Praktikum') }}</label>
                                <input type="text" name="praktikum" id="input-praktikum"
                                    class="form-control form-control-alternative{{ $errors->has('praktikum') ? ' is-invalid' : '' }}"
                                    placeholder="" value="" required autofocus>

                                @if ($errors->has('praktikum'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('praktikum') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="form-group{{ $errors->has('tahun_ajaran') ? ' has-danger' : '' }}">
                                <label class="form-control-label"
                                    for="input-tahun_ajaran">{{ __('Tahun Ajaran') }}</label>
                                <input type="number" name="tahun_ajaran" id="input-tahun_ajaran"
                                    class="form-control form-control-alternative{{ $errors->has('tahun_ajaran') ? ' is-invalid' : '' }}"
                                    placeholder="" value="" required>

                                @if ($errors->has('tahun_ajaran'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('tahun_ajaran') }}</strong>
                                    </span>
                                @endif
                            </div> --}}

                            <div class="text-center">
                                <button type="submit" class="btn btn-success mt-4">{{ __('Tambah') }}</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection
