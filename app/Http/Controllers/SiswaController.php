<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Siswa;

class SiswaController extends Controller
{
    public function index()
    {
        $siswa = Siswa::all();
        return view('siswa', compact('siswa'));
    }

    public function store(Request $request)
    {
        Siswa::create([
            'nama'   => $request->nama,
            'kelas'  => $request->kelas,
            'alamat' => $request->alamat
        ]);

        return redirect('/siswa');
    }

    public function edit($id)
    {
        $siswa = Siswa::all();
        $edit = Siswa::findOrFail($id);

        return view('siswa', compact('siswa', 'edit'));
    }

    public function update(Request $request, $id)
    {
        $siswa = Siswa::findOrFail($id);

        $siswa->update([
            'nama'   => $request->nama,
            'kelas'  => $request->kelas,
            'alamat' => $request->alamat
        ]);

        return redirect('/siswa');
    }
}