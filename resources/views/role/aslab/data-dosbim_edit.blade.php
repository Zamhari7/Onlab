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
                        <h3 class="mb-0">{{ __('Edit data dosen pembimbing') }}</h3>
                    </div>
                </div>
                <div class="card-body">
                    {{-- @foreach ($dosbim as $dosbim) --}}
                    <form method="post" action="{{ route('dosbim.update', $dosbim->id) }}" autocomplete="off">
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
                            <div class="form-group{{ $errors->has('nama_dosbim') ? ' has-danger' : '' }}">
                                <label class="form-control-label"
                                    for="input-nama_dosbim">{{ __('Nama Dosen Pembimbing') }}</label>
                                <input type="text" name="nama_dosbim" id="input-nama_dosbim"
                                    class="form-control form-control-alternative{{ $errors->has('nama_dosbim') ? ' is-invalid' : '' }}"
                                    placeholder="" value="{{ $dosbim->nama_dosbim }}" required autofocus>

                                @if ($errors->has('nama_dosbim'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('nama_dosbim') }}</strong>
                                    </span>
                                @endif
                            </div>

                            <div class="form-group{{ $errors->has('nidn') ? ' has-danger' : '' }}">
                                <label class="form-control-label" for="input-nidn">{{ __('Nidn') }}</label>
                                <input type="number" name="nidn" id="input-nidn"
                                    class="form-control form-control-alternative{{ $errors->has('nidn') ? ' is-invalid' : '' }}"
                                    placeholder="" value="{{ $dosbim->nidn }}" required>

                                @if ($errors->has('nidn'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('nidn') }}</strong>
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

                            <div class="form-group{{ $errors->has('no_hp') ? ' has-danger' : '' }}">
                                <label class="form-control-label" for="input-no_hp">{{ __('Nomer telpon') }}</label>
                                <input type="number" name="no_hp" id="input-no_hp"
                                    class="form-control form-control-alternative{{ $errors->has('no_hp') ? ' is-invalid' : '' }}"
                                    placeholder="" value="{{ $dosbim->no_hp }}" required>

                                @if ($errors->has('no_hp'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('no_hp') }}</strong>
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
