<?php

namespace App\Http\Controllers\Aslab;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;

class TugasController extends Controller
{
    public function index()
    {
        $tugas = \App\Models\Tugas::All();
        // $nbi = Auth::user()->username;
        // $kelas = \App\Models\Mahasiswa::where('nbi', $nbi)->first();
        // $tugas = \App\Models\Tugas::where('id_kelas', $kelas);
        if (auth()->user()->role == 'aslab')
            return view('role.aslab.tugas', ['tugas' => $tugas]);
        elseif (auth()->user()->role == "kalab")
            return view('role.aslab.tugas', ['tugas' => $tugas]);
        elseif (auth()->user()->role == "dosbim")
            return view('role.aslab.tugas', ['tugas' => $tugas]);
        elseif (auth()->user()->role == "mahasiswa")
            return view('role.mahasiswa.tugas', ['tugas' => $tugas]);
        // return view('role.aslab.tugas', ['tugas' => $tugas]);
    }


    public function create()
    {
        $tugas = \App\Models\Tugas::all()->first();
        $kelas = \App\Models\Kelas::all();
        return view('role.aslab.tugas_tambah', [
            'tugas' => $tugas,
            'kelas' => $kelas,
        ]);
        // return view('role.aslab.tugas_tambah');
    }


    public function store(Request $request)
    {

        $id_kelas = $request->get('id_kelas');
        $nama_tugas = $request->get('nama_tugas');
        $tipe = $request->get('tipe');
        $tugas = $request->get('tugas');
        $mulai = $request->get('mulai');
        $selesai = $request->get('selesai');
        $file = $request->file('file');
        $tujuan_file = '/assets/file/tugas';
        $nama_file = $request->get('nama_file');
        $nama_file_ext = $tipe . $tugas . '.' . $file->getClientOriginalExtension();

        // $file = Storage::putFileAs(
        //     $tujuan_file,
        //     $files,
        //     $nama_file,
        // );

        if ($request->hasFile('file')) {
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
        $save_tugas = new \App\Models\Tugas();
        // dd($request);
        $save_tugas->id_kelas = $id_kelas;
        $save_tugas->nama_tugas = $nama_tugas;
        $save_tugas->tipe = $tipe;
        $save_tugas->tugas = $tugas;
        $save_tugas->mulai = $mulai;
        $save_tugas->selesai = $selesai;
        $save_tugas->nama_file = $nama_file_ext;
        $save_tugas->file = $file_upload;
        $save_tugas->save();

        return redirect()->route('tugas.index');
    }


    public function show($id)
    {
        $tugas = \App\Models\Tugas::findOrFail($id);
        $mahasiswa = \App\Models\Mahasiswa::all();
        $fileTugas = \App\Models\FileTugas::where('id_tugas', $id)->get();
        return view('role.aslab.tugas-file', [
            'tugas' => $tugas,
            'mahasiswa' => $mahasiswa,
            'fileTugas' => $fileTugas,
        ]);
        // return view('role.aslab.tugas-file');
    }


    public function edit($id)
    {
        $tugas = \App\Models\Tugas::findOrFail($id);
        // return view('role.aslab.tugas_edit', compact('tugas'));
        $kelas = \App\Models\Kelas::all();
        return view('role.aslab.tugas_edit', [
            'tugas' => $tugas,
            'kelas' => $kelas,
        ]);
    }


    public function update(Request $request, $id)
    {
        $tugas = \App\Models\Tugas::findOrFail($id);
        $tugas->id_kelas = $request->get('id_kelas');
        $tugas->nama_tugas = $request->get('nama_tugas');
        $tugas->tipe = $request->get('tipe');
        $tugas->tugas = $request->get('tugas');
        $tugas->mulai = $request->get('mulai');
        $tugas->selesai = $request->get('selesai');
        $tugas->nama_file = $request->get('nama_file');
        // $file = $request->get('file');

        $file = $request->file('file');
        if ($file) {

            Storage::delete($tugas->file);

            $tujuan_file = '/assets/file/tugas';
            $nama_file = $tugas->tipe . $tugas . '.' . $file->getClientOriginalExtension();

            $file_upload = Storage::putFileAs(
                $tujuan_file,
                $file,
                $nama_file
            );

            $tugas->file = $file_upload;
        } else {
            $file_upload = null;
        }


        // $tugas->id_kelas = $id_kelas;
        // $tugas->nama_tugas = $nama_tugas;
        // $tugas->tipe = $tipe;
        // $tugas->tugas = $tugas;
        // $tugas->mulai = $mulai;
        // $tugas->selesai = $selesai;
        // $tugas->nama_file = $nama_file;
        // $tugas->file = $file;
        $tugas->save();
        return redirect()->route('tugas.index');
    }


    public function destroy($id)
    {
        $tugas = \App\Models\Tugas::where('id', $id);
        $tugas->delete();
        return redirect()->route('tugas.index');
    }

    public function download(Request $request)
    {
        $file = 'assets/file/tugas/' . $request->file;

        if (Storage::exists($file)) {
            // dd($file);
            return Storage::download($file);
        } else {
            echo ('File not found.');
        }
    }
}
