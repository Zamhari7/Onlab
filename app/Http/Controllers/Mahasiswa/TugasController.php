<?php

namespace App\Http\Controllers\Mahasiswa;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class TugasController extends Controller
{
    public function index()
    {
        $tugas = \App\Models\Tugas::All();
        return view('role.mahasiswa.tugas', ['tugas' => $tugas]);
    }
}
