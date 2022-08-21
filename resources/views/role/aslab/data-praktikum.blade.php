@extends('layouts.app')

@section('content')
    {{-- @include('layouts.headers.cards') --}}

    <!-- Header -->
    <div class="header bg-gradient-primary pb-6 pt-5 pt-md-6">
        <div class="container-fluid">
            <div class="header-body">
                <div class="row align-items-center py-4">
                    <div class="col-lg-6 col-7">
                        <h6 class="h2 text-white d-inline-block mb-0">Data Master</h6>
                        <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                            <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                                <li class="breadcrumb-item"><a href="#"><i class="fas fa-home"></i></a></li>
                                <li class="breadcrumb-item"><a href="#">Data Master</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Praktikum</li>
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
                                <h3 class="mb-0">Data Praktikum</h3>
                            </div>
                        </div>
                        <div class="col-lg-6 col-5 text-right">
                            <a href="{{ route('praktikum.create') }}" class="btn btn-primary mr-4">
                                <span class="text-white"><i class="fas fa-plus pr-1"></i></span>
                                <span class="text-white">Tambah Data</span>
                            </a>
                        </div>
                    </div>
                    <!-- Light table -->
                    <div class=" table-responsive p-4">
                        <table id="print" data-toggle="table" data-pagination="true" data-search="true">
                            <thead>
                                <tr>
                                    <th data-sortable="true">No.</th>
                                    {{-- <th>Kode Praktikum</th> --}}
                                    <th>Nama Praktikum</th>
                                    <th>Tahun Ajaran</th>
                                    <th>semester</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 1; ?>
                                @foreach ($prak as $prak)
                                    <tr>
                                        <td>{{ $no++ }}</td>
                                        {{-- <td>{{ $prak->id_prak }}</td> --}}
                                        <td>{{ $prak->nama_prak }}</td>
                                        <td>{{ $prak->tahun_ajaran }}</td>
                                        <td>{{ $prak->semester }}</td>
                                        <td class="row">
                                            <a href="{{ url('praktikum/' . $prak->id . '/edit') }}"
                                                class="btn btn-success"> <i class="fas fa-pen"></i></a>
                                            <form action="{{ url('praktikum/' . $prak->id) }}" method="post">
                                                @csrf
                                                @method('delete')
                                                <input type="hidden" name="_method" value="delete">
                                                <button class="btn btn-danger" type="submit"><i
                                                        class="fas fa-trash"></i></button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <!-- Card footer -->
                    {{-- <div class="card-footer py-4">
                            <nav aria-label="...">
                            <ul class="pagination justify-content-end mb-0">
                                <li class="page-item disabled">
                                <a class="page-link" href="#" tabindex="-1">
                                    <i class="fas fa-angle-left"></i>
                                    <span class="sr-only">Previous</span>
                                </a>
                                </li>
                                <li class="page-item active">
                                <a class="page-link" href="#">1</a>
                                </li>
                                <li class="page-item">
                                <a class="page-link" href="#">2 <span class="sr-only">(current)</span></a>
                                </li>
                                <li class="page-item"><a class="page-link" href="#">3</a></li>
                                <li class="page-item">
                                <a class="page-link" href="#">
                                    <i class="fas fa-angle-right"></i>
                                    <span class="sr-only">Next</span>
                                </a>
                                </li>
                            </ul>
                            </nav>
                        </div> --}}
                </div>
            </div>
        </div>
    </div>


    {{-- @include('layouts.footers.auth') --}}
    </div>
@endsection
