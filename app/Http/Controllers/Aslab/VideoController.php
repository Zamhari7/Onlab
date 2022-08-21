<?php

namespace App\Http\Controllers\Aslab;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class VideoController extends Controller
{
    public function index()
    {
        $video = \App\Models\Video::All();
        if (auth()->user()->role == 'aslab')
            return view('role.aslab.materi-video', ['video' => $video]);
        elseif (auth()->user()->role == "kalab")
            return view('role.aslab.materi-video', ['video' => $video]);
        // elseif (auth()->user()->role == "dosbim")
        //     return view('role.dosen.dashboard');
        elseif (auth()->user()->role == "mahasiswa")
            return view('role.mahasiswa.materi-video', ['video' => $video]);
        // return view('role.aslab.materi-video', ['video' => $video]);
    }


    public function create()
    {
        return view('role.aslab.materi-video_tambah');
    }


    public function store(Request $request)
    {

        $nama_file = $request->get('nama_file');
        $file = $request->file('file');
        $nama_file_ext = $nama_file . '.' . $file->getClientOriginalExtension();
        if ($request->hasFile('file')) {
            $tujuan_file = 'assets/file/video/';
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
        $save_file = new \App\Models\Video();
        $save_file->nama_file = $nama_file_ext;
        $save_file->file = $file_upload;
        $save_file->save();
        return redirect()->route('video.index');
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
        $video = \App\Models\Video::where('id', $id)->first();
        if (Storage::exists('assets/file/video/' . $video->nama_file)) {
            Storage::delete('assets/file/video/' . $video->nama_file);
        } else {
            dd('File does not exists.');
        }
        $video->delete();
        return redirect()->route('video.index');
    }

    public function download(Request $request)
    {
        $file = 'assets/file/video/' . $request->nama_file;

        if (Storage::exists($file)) {
            // dd($file);
            return Storage::download($file);
        } else {
            echo ('File not found.');
        }
    }
}
