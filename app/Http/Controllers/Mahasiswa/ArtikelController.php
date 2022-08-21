<?php

namespace App\Http\Controllers\Mahasiswa;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ArtikelController extends Controller
{
    public function index()
    {
        $artikel = \App\Models\Artikel::All();
        return view('role.mahasiswa.materi-artikel', ['artikel' => $artikel]);
    }
}
