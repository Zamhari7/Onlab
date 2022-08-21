<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Mahasiswa;
use Illuminate\Support\Facades\Auth;

class NilaiTotalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $kelas = \App\Models\Kelas::All();
        $nilai = \App\Models\Nilai::All();
        if (auth()->user()->role == 'aslab')
            return view('role.aslab.nilai', [
                'kelas' => $kelas,
                'nilai' => $nilai
            ]);
        elseif (auth()->user()->role == "kalab")
            return view('role.aslab.nilai', [
                'kelas' => $kelas,
                'nilai' => $nilai
            ]);
        elseif (auth()->user()->role == "dosbim")
            return view('role.aslab.nilai', [
                'kelas' => $kelas,
                'nilai' => $nilai
            ]);
        // elseif (auth()->user()->role == "mahasiswa")
        //     return view('role.mahasiswa.nilai', ['nilai' => $nilai]);
        // return view('role.aslab.nilai', ['nilai' => $nilai]);
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
    }

    public function show($id)
    {
        $kelas = \App\Models\Kelas::find($id)->first();
        $mahasiswa = \App\Models\Mahasiswa::where('id_kelas', $id)->get();
        $nilai = \App\Models\Nilai::all();

        if (auth()->user()->role == 'aslab')
            return view('role.aslab.nilai-total', [
                'mahasiswa' => $mahasiswa,
                'kelas' => $kelas,
                'myThis' => $this,
                'nilai' => $nilai,
            ]);
        elseif (auth()->user()->role == "kalab")
            return view('role.aslab.nilai-total', [
                'mahasiswa' => $mahasiswa,
                'kelas' => $kelas,
                'myThis' => $this,
                'nilai' => $nilai,
            ]);
        elseif (auth()->user()->role == "dosbim")
            return view('role.aslab.nilai-total', [
                'mahasiswa' => $mahasiswa,
                'kelas' => $kelas,
                'myThis' => $this,
                'nilai' => $nilai,
            ]);
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
        //
    }

    public function showNilai($idMahasiswa, $type, $tugas)
    {
        $nilai = DB::table('file_tugas')
            ->join('tugas', 'file_tugas.id_tugas', '=', 'tugas.id')
            ->where('tugas', '=', $tugas)
            ->where('tipe', '=', $type)
            ->where('id_mahasiswa', '=', $idMahasiswa)
            ->first();

        return ($nilai != null) ? $nilai->nilai : null;
    }

    public function simpan_nilai(Request $request)
    {

        $id_mhs = $request->get('id_mahasiswa');
        $id_kls = $request->get('id_kelas');
        $tp1 = $request->get('tp1');
        $tp2 = $request->get('tp2');
        $tp3 = $request->get('tp3');
        $tp4 = $request->get('tp4');
        $tk1 = $request->get('tk1');
        $tk2 = $request->get('tk2');
        $tk3 = $request->get('tk3');
        $tk4 = $request->get('tk4');
        // dd($request->all());
        for ($i = 0; $i < count($id_mhs); $i++) {
            $simpan = \App\Models\Nilai::where('id_mahasiswa', $id_mhs[$i])->first();

            if ($simpan == null) {
                $simpan = new \App\Models\Nilai();
            }

            $nilai_p1 = ($tp1[$i] + $tk1[$i]) / 2;
            $nilai_p2 = ($tp2[$i] + $tk2[$i]) / 2;
            $nilai_p3 = ($tp3[$i] + $tk3[$i]) / 2;
            $nilai_p4 = ($tp4[$i] + $tk4[$i]) / 2;

            $simpan->id_mahasiswa = $id_mhs[$i];
            $simpan->id_kelas = $id_kls[$i];
            $simpan->nilai_p1 = $nilai_p1;
            $simpan->nilai_p2 = $nilai_p2;
            $simpan->nilai_p3 = $nilai_p3;
            $simpan->nilai_p4 = $nilai_p4;

            // dd($simpan);
            $simpan->save();
        }

        return redirect()->route('tugas.index');
    }

    public function nilai_total($id)
    {
        $kelas = \App\Models\Kelas::find($id)->first();
        $mahasiswa = \App\Models\Mahasiswa::where('id_kelas', $id)->get();
        $nilai = \App\Models\Nilai::all();

        $id_user = Auth::user()->id;
        $dosbim = \App\Models\Dosbim::where('id_user', $id_user)->first();
        $id_dosbim = $dosbim->id;
        $bimbingan = \App\Models\Mahasiswa::where('id_dosbim', $id_dosbim)->get();
        if (auth()->user()->role == 'aslab')
            return view('role.aslab.nilai-total', [
                'mahasiswa' => $mahasiswa,
                'kelas' => $kelas,
                'myThis' => $this,
                'nilai' => $nilai
            ]);
        elseif (auth()->user()->role == "kalab")
            return view('role.aslab.nilai-total', [
                'kelas' => $kelas,
                // 'nilai' => $nilai
            ]);
        elseif (auth()->user()->role == "dosbim")
            return view('role.dosen.nilai-total', [
                'bimbingan' => $bimbingan,
                'myThis' => $this,
                // 'nilai' => $nilai
            ]);
    }
}
