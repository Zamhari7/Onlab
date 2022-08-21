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
                        <h3 class="mb-0">{{ __('Edit data mahasiswa') }}</h3>
                    </div>
                </div>
                <div class="card-body">
                    {{-- @foreach ($mahasiswa as $mahasiswa) --}}
                    <form method="post" action="{{ route('mahasiswa.update', $mahasiswa->id) }}" autocomplete="off">
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
                            <div class="form-group{{ $errors->has('nama_mhs') ? ' has-danger' : '' }}">
                                <label class="form-control-label" for="input-nama_mhs">{{ __('Nama Mahasiswa') }}</label>
                                <input type="text" name="nama_mhs" id="input-nama_mhs"
                                    class="form-control form-control-alternative{{ $errors->has('nama_mhs') ? ' is-invalid' : '' }}"
                                    placeholder="" value="{{ $mahasiswa->nama_mhs }}" required autofocus>

                                @if ($errors->has('nama_mhs'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('nama_mhs') }}</strong>
                                    </span>
                                @endif
                            </div>

                            <div class="form-group{{ $errors->has('nbi') ? ' has-danger' : '' }}">
                                <label class="form-control-label" for="input-nbi">{{ __('Nbi') }}</label>
                                <input type="number" name="nbi" id="input-nbi"
                                    class="form-control form-control-alternative{{ $errors->has('nbi') ? ' is-invalid' : '' }}"
                                    placeholder="" value="{{ $mahasiswa->nbi }}" required>

                                @if ($errors->has('nbi'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('nbi') }}</strong>
                                    </span>
                                @endif
                            </div>

                            <div class="form-group {{-- {{ $errors->has('password') ? ' has-danger' : '' }} --}}">
                                <label class="form-control-label" for="input-password">{{ __('Password') }}</label>
                                <input type="text" name="password" id="input-password"
                                    class="form-control form-control-alternative{{-- {{ $errors->has('password') ? ' is-invalid' : '' }} --}}" placeholder=""
                                    value="">

                                {{-- @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif --}}
                            </div>

                            <div class="form-group{{ $errors->has('id_kelas') ? ' has-danger' : '' }}">
                                <label class="form-control-label" for="input-id_kelas">{{ __('Kelas') }}</label>
                                <select class="form-control" name="id_kelas" id="input-id_kelas" required>
                                    <option hidden value="{{ $mahasiswa->kelas->id }}">
                                        {{ $mahasiswa->kelas->nama_kelas }}</option>
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

                            <div class="form-group{{ $errors->has('id_dosbim') ? ' has-danger' : '' }}">
                                <label class="form-control-label"
                                    for="input-id_dosbim">{{ __('Dosen Pembimbing') }}</label>
                                <select class="form-control" name="id_dosbim" id="input-id_dosbim" required>
                                    <option hidden value="{{ $mahasiswa->dosbim->id }}">
                                        {{ $mahasiswa->dosbim->nama_dosbim }}</option>
                                    @foreach ($dosbim as $dosbim)
                                        <option value="{{ $dosbim->id }}">{{ $dosbim->nama_dosbim }}</option>
                                    @endforeach
                                </select>

                                @if ($errors->has('id_dosbim'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('id_dosbim') }}</strong>
                                    </span>
                                @endif
                            </div>

                            <div class="text-center">
                                <button type="submit" class="btn btn-success mt-4">{{ __('Simpan') }}</button>
                            </div>
                        </div>
                    </form>
                    {{-- @endforeach --}}
                </div>
            </div>
        </div>
    </div>

@endsection
