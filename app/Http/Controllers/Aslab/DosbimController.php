<?php

namespace App\Http\Controllers\Aslab;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DosbimController extends Controller
{
    public function index()
    {
        $user = \App\Models\User::where('role', 'dosbim');
        $dosbim = \App\Models\Dosbim::all();
        return view('role.aslab.data-dosbim', [
            'user' => $user,
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
        return view('role.aslab.data-dosbim_tambah');
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
            'username' => $request->nidn,
            'password' => bcrypt($request->nidn), // password
            'role' => 'dosbim',

        ]);
        \App\Models\Dosbim::create([
            'nama_dosbim' => $user->name,
            'nidn' => $request->nidn,
            'no_hp' => $request->no_hp,
            'id_user' => $user->id,
        ]);

        return redirect()->route('dosbim.index');
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
        $dosbim = \App\Models\Dosbim::findOrFail($id);
        // return dd($dosbim);
        return view('role.aslab.data-dosbim_edit', compact('dosbim'));
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
        $dosbim = \App\Models\Dosbim::findOrFail($id);
        $dosbim->nama_dosbim = $request->get('nama_dosbim');
        $dosbim->nidn = $request->get('nidn');
        $dosbim->no_hp = $request->get('no_hp');
        $dosbim->save();
        if ($request->get('password') != '') {
            $user = \App\Models\User::where('username', $dosbim->nidn)->first();
            $user->password = bcrypt($request->get('password'));
            // dd($user);
            $user->save();
        }
        return redirect()->route('dosbim.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($username)
    {
        // $dosbim = \App\Models\Dosbim::find($id);
        $dosbim = \App\Models\Dosbim::where('nidn', $username);
        $user = \App\Models\User::where('username', $username);

        $dosbim->delete();
        $user->delete();
        return redirect()->route('dosbim.index');
        // return redirect('role.aslab.data-praktikum');
    }
}
