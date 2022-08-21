<?php

namespace App\Http\Controllers\Aslab;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AslabController extends Controller
{
    public function index()
    {
        $user = \App\Models\User::where('role', 'aslab');
        $aslab = \App\Models\Aslab::all();
        return view('role.aslab.data-aslab', [
            'user' => $user,
            'aslab' => $aslab,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('role.aslab.data-aslab_tambah');
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
            'role' => 'aslab',

        ]);
        \App\Models\Aslab::create([
            'nama_aslab' => $user->name,
            'nbi' => $request->nbi,
            'no_hp' => $request->no_hp,
            'id_user' => $user->id,
        ]);

        // $nama_dosbim = $request->get('nama_dosbim');
        // $nidn = $request->get('nidn');
        // $no_hp = $request->get('no_hp');
        // Menyimpan data kedalam tabel
        // $save_dosbim = new \App\Models\Dosbim();
        // $save_dosbim->nama_dosbim = $nama_dosbim;
        // $save_dosbim->nidn = $nidn;
        // $save_dosbim->no_hp = $no_hp;
        // $save_dosbim->save();
        return redirect()->route('aslab.index');
        // return dd($user);
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
        $aslab = \App\Models\Aslab::findOrFail($id);
        return view('role.aslab.data-aslab_edit', compact('aslab'));
        // return view('role.aslab.data-praktikum_edit', ['prak' => $prak]);

        // $dosbim = \App\Models\Dosbim::where('nidn', $username)->get();
        // $user = \App\Models\User::where('username', $username)->get();
        // return view('role.aslab.data-dosbim_edit', [
        //     'user' => $user,
        //     'dosbim' => $dosbim,
        // ]);
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
        $aslab = \App\Models\Aslab::findOrFail($id);
        $aslab->nama_aslab = $request->get('nama_aslab');
        $aslab->nbi = $request->get('nbi');
        $aslab->no_hp = $request->get('no_hp');
        $aslab->save();
        if ($request->get('password') != '') {
            $user = \App\Models\User::where('username', $aslab->nbi)->first();
            $user->password = bcrypt($request->get('password'));
            // dd($user);
            $user->save();
        }
        return redirect()->route('aslab.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($username)
    {
        // $aslab = \App\Models\aslab::find($id);
        $aslab = \App\Models\Aslab::where('nbi', $username);
        $user = \App\Models\User::where('username', $username);

        $aslab->delete();
        $user->delete();
        return redirect()->route('aslab.index');
        // return redirect('role.aslab.data-praktikum');
    }
}
