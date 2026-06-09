<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Mapel;

class MapelController extends Controller
{
    // TAMPIL DATA
    public function index()
    {
        $mapel = Mapel::all();

        return view('mapel', compact('mapel'));
    }

    // SIMPAN DATA
    public function store(Request $request)
    {
        Mapel::create([
            'nama_mapel' => $request->nama_mapel,
            'guru' => $request->guru,
            'kelas' => $request->kelas
        ]);

        return redirect('/mapel');
    }

    // EDIT DATA
    public function edit($id)
    {
        $mapel = Mapel::all();

        $edit = Mapel::find($id);

        return view('mapel', compact('mapel', 'edit'));
    }

    // UPDATE DATA
    public function update(Request $request, $id)
    {
        $mapel = Mapel::find($id);

        $mapel->nama_mapel = $request->nama_mapel;
        $mapel->guru = $request->guru;
        $mapel->kelas = $request->kelas;

        $mapel->save();

        return redirect('/mapel');
    }

    // HAPUS DATA
    public function delete($id)
    {
        $mapel = Mapel::find($id);

        $mapel->delete();

        return redirect('/mapel');
    }
}