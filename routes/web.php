<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Models\Siswa;
use App\Models\Guru;
use App\Models\Mapel;

use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\DashboardController;

/*
|--------------------------------------------------------------------------
| DASHBOARD (PAKAI CONTROLLER - WAJIB)
|--------------------------------------------------------------------------
*/
Route::get('/', [DashboardController::class, 'index']);

/*
|--------------------------------------------------------------------------
| LOGIN
|--------------------------------------------------------------------------
*/
Route::get('/login', [LoginController::class, 'index']);
Route::post('/login', [LoginController::class, 'login']);

Route::get('/register', [RegisterController::class, 'index']);
Route::post('/register', [RegisterController::class, 'store']);

Route::get('/logout', [LoginController::class, 'logout']);

/*
|--------------------------------------------------------------------------
| DATA SISWA
|--------------------------------------------------------------------------
*/
Route::get('/siswa', function () {
    return view('siswa', [
        'siswa' => Siswa::all()
    ]);
});

Route::post('/siswa', function (Request $request) {
    Siswa::create([
        'nama'   => $request->nama,
        'kelas'  => $request->kelas,
        'alamat' => $request->alamat,
    ]);

    return redirect('/siswa');
});

Route::get('/siswa/edit/{id}', function ($id) {
    return view('siswa', [
        'siswa' => Siswa::all(),
        'edit'  => Siswa::findOrFail($id)
    ]);
});

Route::post('/siswa/update/{id}', function (Request $request, $id) {
    Siswa::findOrFail($id)->update([
        'nama'   => $request->nama,
        'kelas'  => $request->kelas,
        'alamat' => $request->alamat,
    ]);

    return redirect('/siswa');
});

Route::get('/siswa/delete/{id}', function ($id) {
    Siswa::findOrFail($id)->delete();
    return redirect('/siswa');
});

/*
|--------------------------------------------------------------------------
| DATA GURU
|--------------------------------------------------------------------------
*/
Route::get('/guru', function () {
    return view('guru', [
        'guru' => Guru::all()
    ]);
});

Route::post('/guru', function (Request $request) {
    Guru::create([
        'nama'  => $request->nama,
        'mapel' => $request->mapel,
    ]);

    return redirect('/guru');
});

Route::get('/guru/edit/{id}', function ($id) {
    return view('guru', [
        'guru' => Guru::all(),
        'edit' => Guru::findOrFail($id)
    ]);
});

Route::post('/guru/update/{id}', function (Request $request, $id) {
    Guru::findOrFail($id)->update([
        'nama'  => $request->nama,
        'mapel' => $request->mapel,
    ]);

    return redirect('/guru');
});

Route::get('/guru/delete/{id}', function ($id) {
    Guru::findOrFail($id)->delete();
    return redirect('/guru');
});

/*
|--------------------------------------------------------------------------
| DATA MAPEL
|--------------------------------------------------------------------------
*/
Route::get('/mapel', function () {
    return view('mapel', [
        'mapel' => Mapel::all()
    ]);
});

Route::post('/mapel', function (Request $request) {
    Mapel::create([
        'nama_mapel' => $request->nama_mapel,
    ]);

    return redirect('/mapel');
});

Route::get('/mapel/edit/{id}', function ($id) {
    return view('mapel', [
        'mapel' => Mapel::all(),
        'edit'  => Mapel::findOrFail($id)
    ]);
});

Route::post('/mapel/update/{id}', function (Request $request, $id) {
    Mapel::findOrFail($id)->update([
        'nama_mapel' => $request->nama_mapel,
    ]);

    return redirect('/mapel');
});

Route::get('/mapel/delete/{id}', function ($id) {
    Mapel::findOrFail($id)->delete();
    return redirect('/mapel');
});