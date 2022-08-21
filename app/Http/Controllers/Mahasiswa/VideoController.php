<?php

namespace App\Http\Controllers\Mahasiswa;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class VideoController extends Controller
{
    public function index()
    {
        $video = \App\Models\Video::All();
        return view('role.mahasiswa.materi-video', ['video' => $video]);
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
