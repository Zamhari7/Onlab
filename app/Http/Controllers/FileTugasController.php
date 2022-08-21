<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Mahasiswa;
use App\Models\Tugas;
use App\Models\FileTugas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class FileTugasController extends Controller
{
    public function index()
    {
        // $tugas = \App\Models\Tugas::All();
        // if (auth()->user()->role == 'aslab')
        //     return view('role.aslab.tugas', ['tugas' => $tugas]);
        // elseif (auth()->user()->role == "kalab")
        //     return view('role.aslab.tugas', ['tugas' => $tugas]);
        // // elseif (auth()->user()->role == "dosbim")
        // //     return view('role.dosen.dashboard');
        // elseif (auth()->user()->role == "mahasiswa")
        //     return view('role.mahasiswa.tugas', ['tugas' => $tugas]);
    }


    public function create()
    {
        // $tugas = \App\Models\Tugas::findOrFail($id);
        // $kelas = \App\Models\Kelas::all();
        // return view('role.mahasiswa.tugas-upload', [
        //     'tugas' => $tugas,
        //     'kelas' => $kelas,
        // ]);
        return view('role.mahasiswa.tugas-upload');
    }


    public function store(Request $request)
    {
    }


    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        $tugas = \App\Models\Tugas::findOrFail($id);
        $kelas = \App\Models\Kelas::all();
        return view('role.mahasiswa.tugas-upload', [
            'tugas' => $tugas,
            'kelas' => $kelas,
        ]);
    }


    public function update(Request $request, $id)
    {
        $nbi = Auth::user()->username;
        $mhs = Mahasiswa::where('nbi', $nbi)->first();
        $kelas = $mhs->id_kelas;
        // dd($kelas);
        $tugas = Tugas::findOrFail($id);
        $id_tugas = $tugas->get('id');
        $mahasiswa = $mhs->id;
        // $tipe = $tugas->get('tipe');
        // $tugaske = $tugas->get('tugas');
        // $keterangan = $request->file('keterangan');
        $nilai = $request->file('nilai');
        $file = $request->file('file_tugas');
        $tujuan_file = '/assets/file/tugas';
        $nama_file = $request->get('nama_file');
        $nama_file_ext = $file->getClientOriginalName();

        $save_file = new \App\Models\FileTugas();

        if ($request->hasFile('file_tugas')) {
            Storage::delete($save_file->file_tugas);
            DB::table('file_tugas')
                ->where('id_mahasiswa', $mahasiswa)
                ->where('id_kelas', $kelas)
                ->where('id_tugas', $id)
                ->delete();
            $nama_file = $nama_file_ext;

            $file_upload = Storage::putFileAs(
                $tujuan_file,
                $file,
                $nama_file,
            );
        } else {
            $file_upload = null;
        }
        //Menyimpan data kedalam tabel
        $save_file->nama_file = $nama_file_ext;
        $save_file->file_tugas = $file_upload;
        $save_file->tgl_upload = \Carbon\Carbon::now()->format('Y-m-d H:i:s');
        $save_file->id_kelas = $kelas;
        $save_file->id_mahasiswa = $mahasiswa;
        $save_file->id_tugas = $id;
        $save_file->nilai = $nilai;
        $save_file->save();

        return redirect()->route('tugas-mahasiswa.index');
    }


    public function destroy($id)
    {
        // $tugas = \App\Models\Tugas::where('id', $id);
        // $tugas->delete();
        // return redirect()->route('tugas.index');
    }

    public function download(Request $request)
    {
        $file_tugas = 'assets/file/tugas/' . $request->file_tugas;

        if (Storage::exists($file_tugas)) {
            // dd($file);
            return Storage::download($file_tugas);
        } else {
            echo ('File not found.');
        }
    }

    public function update_nilai(Request $request)
    {

        $id = $request->get('id');
        $nilai = $request->get('nilai');
        $keterangan = $request->get('keterangan');
        // dd($fileTugas);
        for ($i = 0; $i < count($id); $i++) {
            $fileTugas = FileTugas::where('id', $id[$i])->first();
            $fileTugas->id = $id[$i];
            if (isset($nilai[$i])) {
                $fileTugas->nilai = $nilai[$i];
            }
            if (isset($keterangan[$i])) {
                // dd($keterangan);
                $fileTugas->keterangan = $keterangan[$i];
            }
            $fileTugas->save();
        }

        return redirect()->route('tugas.index');
    }
}
