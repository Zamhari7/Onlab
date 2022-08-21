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
                        <h3 class="mb-0">{{ __('Edit data praktikum') }}</h3>
                    </div>
                </div>
                <div class="card-body">
                    @foreach ($prak as $prak)
                        <form method="post" action="{{ route('praktikum.update', $prak->id) }}" autocomplete="off">
                            @csrf
                            @method("PUT")

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
                                <div class="form-group{{ $errors->has('nama_prak') ? ' has-danger' : '' }}">
                                    <label class="form-control-label"
                                        for="input-nama_prak">{{ __('Nama Praktikum') }}</label>
                                    <input type="text" name="nama_prak" id="input-nama_prak"
                                        class="form-control form-control-alternative{{ $errors->has('nama_prak') ? ' is-invalid' : '' }}"
                                        placeholder="" value="{{ $prak->nama_prak }}" required autofocus>

                                    @if ($errors->has('nama_prak'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('nama_prak') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="form-group{{ $errors->has('tahun_ajaran') ? ' has-danger' : '' }}">
                                    <label class="form-control-label"
                                        for="input-tahun_ajaran">{{ __('Tahun Ajaran') }}</label>
                                    <input type="number" name="tahun_ajaran" id="input-tahun_ajaran"
                                        class="form-control form-control-alternative{{ $errors->has('tahun_ajaran') ? ' is-invalid' : '' }}"
                                        placeholder="" value="{{ $prak->tahun_ajaran }}" required>

                                    @if ($errors->has('tahun_ajaran'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('tahun_ajaran') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="form-group{{ $errors->has('semester') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-semester">{{ __('Semester') }}</label>
                                    <input type="text" name="semester" id="input-semester"
                                        class="form-control form-control-alternative{{ $errors->has('semester') ? ' is-invalid' : '' }}"
                                        placeholder="" value="{{ $prak->semester }}" required>

                                    @if ($errors->has('semester'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('semester') }}</strong>
                                        </span>
                                    @endif
                                </div>

                                <div class="text-center">
                                    <button type="submit" class="btn btn-success mt-4">{{ __('Simpan') }}</button>
                                </div>
                            </div>
                        </form>
                    @endforeach
                </div>
            </div>
        </div>
    </div>

@endsection
