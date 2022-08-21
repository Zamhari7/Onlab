<?php

namespace App\Http\Controllers\Mahasiswa;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ModulController extends Controller
{

    public function index()
    {
        $modul = \App\Models\Modul::All();
        return view('role.mahasiswa.materi-modul', ['modul' => $modul]);
    }
}
