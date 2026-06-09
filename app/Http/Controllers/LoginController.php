<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller
{
    public function index()
    {
        return view('login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);

        $admin = Admin::where('USERNAME', $request->username)->first();

        if (!$admin) {
            return back()->with('error', 'Username tidak ditemukan');
        }

        if (!Hash::check($request->password, $admin->password)) {
            return back()->with('error', 'Password salah');
        }

        Session::put('admin_id', $admin->id);
        Session::put('admin_username', $admin->username);

        return redirect('/welcome')
            ->with('success', 'Login berhasil');
    }

    public function logout()
    {
        Session::flush();

        return redirect('/login')
            ->with('success', 'Berhasil logout');
    }
}