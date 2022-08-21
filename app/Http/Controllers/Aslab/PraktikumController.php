<?php

namespace App\Http\Controllers\Aslab;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PraktikumController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $prak = \App\Models\Praktikum::All();
        return view('role.aslab.data-praktikum', ['prak' => $prak]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('role.aslab.data-praktikum_tambah');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $nama_prak = $request->get('nama_prak');
        $tahun_ajaran = $request->get('tahun_ajaran');
        $semester = $request->get('semester');
        //Menyimpan data kedalam tabel
        $save_prak = new \App\Models\Praktikum();
        $save_prak->nama_prak = $nama_prak;
        $save_prak->tahun_ajaran = $tahun_ajaran;
        $save_prak->semester = $semester;
        $save_prak->save();
        return redirect()->route('praktikum.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $prak = \App\Models\Praktikum::findOrFail($id)->get();
        // return view('role.aslab.data-praktikum_edit', ['prak' => $prak]);
        return view('role.aslab.data-praktikum_edit', compact('prak'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $prak = \App\Models\Praktikum::findOrFail($id)->first();
        $prak->nama_prak = $request->get('nama_prak');
        $prak->tahun_ajaran = $request->get('tahun_ajaran');
        $prak->semester = $request->get('semester');
        $prak->save();
        return redirect()->route('praktikum.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $prak = \App\Models\Praktikum::find($id);
        $prak->delete();
        return redirect()->route('praktikum.index');
        // return redirect('role.aslab.data-praktikum');
    }
}
