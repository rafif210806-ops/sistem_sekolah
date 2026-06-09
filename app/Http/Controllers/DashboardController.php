<?php

namespace App\Http\Controllers;

use App\Models\Siswa;
use App\Models\Guru;
use App\Models\Mapel;

class DashboardController extends Controller
{
    public function index()
    {
        $siswa = Siswa::orderBy('ID', 'desc')->get()->map(function ($item) {
            return [
                'type' => 'siswa',
                'nama' => $item->nama,
                'created_at' => $item->ID, // fallback
            ];
        });

        $guru = Guru::orderBy('ID', 'desc')->get()->map(function ($item) {
            return [
                'type' => 'guru',
                'nama' => $item->nama,
                'created_at' => $item->ID,
            ];
        });

        $mapel = Mapel::orderBy('ID', 'desc')->get()->map(function ($item) {
            return [
                'type' => 'mapel',
                'nama' => $item->nama_mapel,
                'created_at' => $item->ID,
            ];
        });
        

        $aktivitas = collect()
            ->merge($siswa)
            ->merge($guru)
            ->merge($mapel)
            ->sortByDesc('created_at')
            ->values();

        return view('welcome', [
            'totalSiswa' => Siswa::count(),
            'totalGuru' => Guru::count(),
            'totalMapel' => Mapel::count(),
            'aktivitas' => $aktivitas,
        ]);
    }
}