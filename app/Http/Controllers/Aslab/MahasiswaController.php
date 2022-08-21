<?php

namespace App\Http\Controllers\Aslab;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class MahasiswaController extends Controller
{
    public function index()
    {
        $user = \App\Models\User::where('role', 'mahasiswa');
        $mahasiswa = \App\Models\Mahasiswa::all();
        $kelas = \App\Models\Kelas::all();
        $dosbim = \App\Models\Dosbim::all();
        return view('role.aslab.data-mahasiswa', [
            'user' => $user,
            'mahasiswa' => $mahasiswa,
            'kelas' => $kelas,
            'dosbim' => $dosbim,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $praktikum = \App\Models\Praktikum::all();
        $kelas = \App\Models\Kelas::all();
        $dosbim = \App\Models\Dosbim::all();
        return view('role.aslab.data-mahasiswa_tambah', [
            'praktikum' => $praktikum,
            'kelas' => $kelas,
            'dosbim' => $dosbim,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $user = \App\Models\User::create([
            'name' => $request->name,
            'username' => $request->nbi,
            'password' => bcrypt($request->nbi), // password
            'role' => 'mahasiswa',

        ]);
        \App\Models\Mahasiswa::create([
            'nama_mhs' => $user->name,
            'nbi' => $request->nbi,
            'id_user' => $user->id,
            'id_praktikum' => $request->id_praktikum,
            'id_kelas' => $request->id_kelas,
            'id_dosbim' => $request->id_dosbim,
        ]);

        return redirect()->route(
            'mahasiswa.index'
        );
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
        $mahasiswa = \App\Models\Mahasiswa::findOrFail($id);
        // return dd($dosbim);
        // return view('role.aslab.data-mahasiswa_edit', compact('mahasiswa'));
        $praktikum = \App\Models\Praktikum::all();
        $kelas = \App\Models\Kelas::all();
        $dosbim = \App\Models\Dosbim::all();
        return view('role.aslab.data-mahasiswa_edit', [
            'mahasiswa' => $mahasiswa,
            'praktikum' => $praktikum,
            'kelas' => $kelas,
            'dosbim' => $dosbim,
        ]);
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
        $mahasiswa = \App\Models\Mahasiswa::findOrFail($id);
        $mahasiswa->nama_mhs = $request->get('nama_mhs');
        $mahasiswa->nbi = $request->get('nbi');
        // $mahasiswa->id_praktikum = $request->get('id_praktikum');
        $mahasiswa->id_kelas = $request->get('id_kelas');
        $mahasiswa->id_dosbim = $request->get('id_dosbim');
        $mahasiswa->save();
        if ($request->get('password') != '') {
            $user = \App\Models\User::where('username', $mahasiswa->nbi)->first();
            $user->password = bcrypt($request->get('password'));
            // dd($user);
            $user->save();
        }
        return redirect()->route('mahasiswa.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($username)
    {
        // $mahasiswa = \App\Models\mahasiswa::find($id);
        $mahasiswa = \App\Models\mahasiswa::where('nbi', $username);
        $user = \App\Models\User::where('username', $username);

        $mahasiswa->delete();
        $user->delete();
        return redirect()->route('mahasiswa.index');
        // return redirect('role.mahasiswa.data-praktikum');
    }

    public function bimbingan()
    {
        $user = \App\Models\User::where('role', 'mahasiswa');
        $kelas = \App\Models\Kelas::all();
        $id = Auth::user()->id;
        $dosbim = \App\Models\Dosbim::where('id_user', $id)->first();
        $id_dosbim = $dosbim->id;
        $mahasiswa = \App\Models\Mahasiswa::where('id_dosbim', $id_dosbim)->get();
        // dd($mahasiswa);
        return view('role.dosen.data-mahasiswa-bimbingan', [
            'user' => $user,
            'mahasiswa' => $mahasiswa,
            'kelas' => $kelas,
            'dosbim' => $dosbim,
        ]);
    }
}
