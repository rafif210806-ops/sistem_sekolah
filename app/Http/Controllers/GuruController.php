<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Guru;
use App\Models\Mapel;

class GuruController extends Controller
{
    public function index()
    {
        $guru = Guru::all();

        return view('guru', compact('guru'));
    }

    // SIMPAN DATA
    public function store(Request $request)
    {
        Guru::create([

            'nama' => $request->nama,
            'mapel' => $request->mapel

        ]);

        return redirect('/guru');
    }

    // TAMPILKAN DATA EDIT
   public function edit($id)
{
    $guru = Guru::all();

    $edit = Guru::find($id);

    return view('guru', compact('guru', 'edit'));
}

    // UPDATE DATA
  public function update(Request $request, $id)
{
    $guru = Guru::find($id);

    $guru->nama = $request->nama;
    $guru->mapel = $request->mapel;

    $guru->save();

    return redirect('/guru');
}

    // HAPUS DATA
    public function delete($id)
{
    $guru = Guru::find($id);

    $guru->delete();

    return redirect('/guru');
}
}