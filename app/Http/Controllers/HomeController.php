<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $kelas = \App\Models\Kelas::all();
        $all_dosbim = \App\Models\Dosbim::all();
        $mahasiswa = \App\Models\Mahasiswa::all();
        $aslab = \App\Models\Aslab::all();
        $user = \App\Models\User::all();
        $fileTugas = \App\Models\FileTugas::all();
        $koreksiPendahuluan = DB::table('file_tugas')
            ->join('tugas', 'file_tugas.id_tugas', '=', 'tugas.id')
            ->where('tipe', '=', 'Tugas Pendahuluan')
            ->where('nilai', '=', null)
            ->get();

        $koreksiKegiatan = DB::table('file_tugas')
            ->join('tugas', 'file_tugas.id_tugas', '=', 'tugas.id')
            ->where('tipe', '=', 'Kegiatan Praktikum')
            ->where('nilai', '=', null)
            ->get();

        $koreksiUjian = DB::table('file_tugas')
            ->join('tugas', 'file_tugas.id_tugas', '=', 'tugas.id')
            ->where('tipe', '=', 'Ujian')
            ->where('nilai', '=', null)
            ->get();

        $id_user = Auth::user()->id;

        if (auth()->user()->role == 'aslab') {
            # code...
        } elseif (auth()->user()->role == "kalab") {
            # code...
        } elseif (auth()->user()->role == "dosbim") {
            $dosbim = \App\Models\Dosbim::where('id_user', $id_user)->first();
            $id_dosbim = $dosbim->id;
            $bimbingan = \App\Models\Mahasiswa::where('id_dosbim', $id_dosbim)->get();
        } elseif (auth()->user()->role == "mahasiswa") {
            $id_my_dosbim =  \App\Models\Mahasiswa::where('id_user', $id_user)->first();
            $my_dosbim = \App\Models\Dosbim::where('id', $id_my_dosbim->id_dosbim)->first();
            $my_kelas = \App\Models\Kelas::where('id', $id_my_dosbim->id_kelas)->first();
        }


        // dd($koreksiPendahuluan);
        if (auth()->user()->role == 'aslab')
            return view('role.aslab.dashboard', [
                'dosbim' => $all_dosbim,
                'kelas' => $kelas,
                'mahasiswa' => $mahasiswa,
                'user' => $user,
                'aslab' => $aslab,
                'fileTugas' => $fileTugas,
                'pendahuluan' => $koreksiPendahuluan,
                'kegiatan' => $koreksiKegiatan,
                'ujian' => $koreksiUjian,
            ]);
        elseif (auth()->user()->role == "kalab")
            return view('role.aslab.dashboard', [
                'dosbim' => $all_dosbim,
                'kelas' => $kelas,
                'mahasiswa' => $mahasiswa,
            ]);
        elseif (auth()->user()->role == "dosbim")
            return view('role.dosen.dashboard', [

                'aslab' => $aslab,
                'mahasiswa' => $bimbingan,
            ]);
        elseif (auth()->user()->role == "mahasiswa")

            return view('role.mahasiswa.dashboard', [
                'dosbim' => $my_dosbim,
                'kelas' => $my_kelas,
                'mahasiswa' => $mahasiswa,
            ]);

        // return view('role.aslab.dashboard');
    }
}
