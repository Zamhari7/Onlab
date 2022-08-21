<?php

namespace App\Http\Controllers\Aslab;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ArtikelController extends Controller
{
    public function index()
    {
        $artikel = \App\Models\Artikel::All();
        return view('role.aslab.materi-artikel', ['artikel' => $artikel]);
    }


    public function create()
    {
        return view('role.aslab.materi-artikel_tambah');
    }


    public function store(Request $request)
    {
        $nama_artikel = $request->get('nama_file');
        $link_artikel = $request->get('file');
        $save_artikel = new \App\Models\Artikel();
        $save_artikel->nama_file = $nama_artikel;
        $save_artikel->file = $link_artikel;
        $save_artikel->save();
        return redirect()->route('artikel.index');
    }


    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        //
    }


    public function update(Request $request, $id)
    {
        //
    }


    public function destroy($id)
    {
        $artikel = \App\Models\Artikel::where('id', $id);
        $artikel->delete();
        return redirect()->route('artikel.index');
    }
}
