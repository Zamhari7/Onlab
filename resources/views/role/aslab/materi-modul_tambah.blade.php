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
                        <h3 class="mb-0">{{ __('Tambah modul') }}</h3>
                    </div>
                </div>
                <div class="card-body">
                    <form method="post" action="{{ route('modul.store') }}" autocomplete="off"
                        enctype="multipart/form-data">
                        @csrf

                        @if (session('status'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                {{ session('status') }}
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        @endif


                        <div class="pl-lg-4">
                            <div class="form-group{{ $errors->has('nama_file') ? ' has-danger' : '' }}">
                                <label class="form-control-label" for="input-nama_file">{{ __('Nama File') }}</label>
                                <input type="text" name="nama_file" id="input-nama_file"
                                    class="form-control form-control-alternative{{ $errors->has('nama_file') ? ' is-invalid' : '' }}"
                                    placeholder="" value="" required autofocus>

                                @if ($errors->has('nama_file'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('nama_file') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="form-group{{ $errors->has('file') ? ' has-danger' : '' }}">
                                <label class="form-control-label" for="input-file">{{ __('File') }}</label>
                                <input type="file" name="file" accept="pdf/*" id="input-file"
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
@endsection
