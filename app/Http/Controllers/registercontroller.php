<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class RegisterController extends Controller
{
    public function index()
    {
        return view('register');
    }

    public function store(Request $request)
    {
        $request->validate([
            'username' => 'required|string|max:50',
            'password' => 'required|string|min:6|confirmed',
        ]);

        $admin = Admin::create([
            'USERNAME' => $request->username,
            'PASSWORD' => Hash::make($request->password),
        ]);

       Session::put('admin_id', $admin->ID);
Session::put('admin_username', $admin->USERNAME);

return redirect('/login')
    ->with('success', 'Registrasi berhasil, silakan login.');
    }
}