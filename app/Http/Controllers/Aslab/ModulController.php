<?php

namespace App\Http\Controllers\Aslab;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ModulController extends Controller
{

    public function index()
    {
        $modul = \App\Models\Modul::All();
        if (auth()->user()->role == 'aslab')
            return view('role.aslab.materi-modul', ['modul' => $modul]);
        elseif (auth()->user()->role == "kalab")
            return view('role.aslab.materi-modul', ['modul' => $modul]);
        // elseif (auth()->user()->role == "dosbim")
        //     return view('role.dosen.dashboard');
        elseif (auth()->user()->role == "mahasiswa")
            return view('role.mahasiswa.materi-modul', ['modul' => $modul]);
        // return view('role.aslab.materi-modul', ['modul' => $modul]);
    }


    public function create()
    {
        return view('role.aslab.materi-modul_tambah');
    }


    public function store(Request $request)
    {
        $nama_file = $request->get('nama_file');
        $file = $request->file('file');
        $nama_file_ext = $nama_file . '.' . $file->getClientOriginalExtension();
        if ($request->hasFile('file')) {
            $tujuan_file = 'assets/file/modul/';
            $judul_file = $nama_file_ext;

            $file_upload = Storage::putFileAs(
                $tujuan_file,
                $file,
                $judul_file,
            );
        } else {
            $file_upload = null;
        }

        // dd($nama_file_ext);
        $save_file = new \App\Models\Modul();
        $save_file->nama_file = $nama_file_ext;
        $save_file->file = $file_upload;
        $save_file->save();
        return redirect()->route('modul.index');
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
        $modul = \App\Models\Modul::where('id', $id)->first();
        if (Storage::exists('assets/file/modul/' . $modul->nama_file)) {
            Storage::delete('assets/file/modul/' . $modul->nama_file);
        } else {
            dd('File does not exists.');
        }
        $modul->delete();
        return redirect()->route('modul.index');
    }

    public function download(Request $request)
    {
        $file = 'assets/file/modul/' . $request->nama_file;

        if (Storage::exists($file)) {
            // dd($file);
            return Storage::download($file);
        } else {
            echo ('File not found.');
        }
    }
}
