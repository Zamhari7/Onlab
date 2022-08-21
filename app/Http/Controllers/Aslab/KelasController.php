<?php

namespace App\Http\Controllers\Aslab;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Kelas;
use Illuminate\Support\Facades\DB;

class KelasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->Kelas = new Kelas();
    }

    public function index()
    {
        $kelas = \App\Models\Kelas::All();
        // $kelas = [
        //     'kelas' => $this->Kelas->allData(),
        // ];
        // $kelas = DB::table('kelas')
        //     ->join('praktikum', 'kelas.id_prak', '=', 'praktikum.id')
        //     ->get();
        // ->get(['praktikum.nama_prak', 'praktikum.tahun_ajaran', 'praktikum.semester']);

        return view('role.aslab.data-kelas', compact('kelas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('role.aslab.data-kelas_tambah');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $nama_kelas = $request->get('nama_kelas');
        // $nama_prak = $request->get('nama_prak');
        // $tahun_ajar = $request->get('tahun_ajar');
        // $semester = $request->get('semester');
        // Menyimpan data kedalam tabel
        $save_kelas = new \App\Models\Kelas();
        // $save_kelas = DB::table('kelas')
        //     ->join('praktikum', 'kelas.id_prak', '=', 'praktikum.id')
        //     ->get();
        // $save_kelas =  $this->Kelas->allData();
        $save_kelas->nama_kelas = $nama_kelas;
        // $save_kelas->nama_prak = $nama_prak;
        // $save_kelas->tahun_ajar = $tahun_ajar;
        // $save_kelas->semester = $semester;
        $save_kelas->save();
        return redirect()->route('kelas.index');
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
        $kelas = \App\Models\Kelas::findOrFail($id)->get();
        // return view('role.aslab.data-praktikum_edit', ['prak' => $prak]);
        return view('role.aslab.data-kelas_edit', compact('kelas'));
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
        $kelas = \App\Models\Kelas::findOrFail($id)->first();
        $kelas->nama_prak = $request->get('nama_prak');
        $kelas->save();
        return redirect()->route('kelas.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $prak = \App\Models\Kelas::find($id);
        $prak->delete();
        return redirect()->route('kelas.index');
        // return redirect('role.aslab.data-praktikum');
    }
}
