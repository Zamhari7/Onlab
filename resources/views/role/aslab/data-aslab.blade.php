@extends('layouts.app')

@section('content')

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
                                <li class="breadcrumb-item active" aria-current="page">Aslab</li>
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
                                <h3 class="mb-0">Data Asisten Laboratorium</h3>
                            </div>
                        </div>
                        <div class="col-lg-6 col-5 text-right">
                            <a class="btn btn-primary mr-4" href="{{ route('aslab.create') }}">
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
                                    <th data-sortable="true" data-field="id">No.</th>
                                    <th data-field="name">Kode Aslab</th>
                                    <th data-field="price">Username</th>
                                    <th data-field="price">Nama</th>
                                    <th data-field="price">No. HP</th>
                                    <th data-field="price">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 1; ?>
                                @foreach ($aslab as $aslab)
                                    <tr>
                                        <td>{{ $no++ }}</td>
                                        <td>{{ $aslab->nbi }}</td>
                                        <td>{{ $aslab->nama_aslab }}</td>
                                        <td>{{ $aslab->no_hp }}</td>
                                        <td class="row">
                                            <a href="{{ url('aslab/' . $aslab->id . '/edit') }}" class="btn btn-success">
                                                <i class="fas fa-pen"></i></a>
                                            <form action="{{ url('aslab/' . $aslab->nbi) }}" method="post">
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
                </div>
            </div>
        </div>
    </div>


    {{-- @include('layouts.footers.auth') --}}
    </div>
@endsection
