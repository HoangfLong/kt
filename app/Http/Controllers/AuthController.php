<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SinhVien;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    public function showLogin()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'MaSV' => 'required|exists:sinh_viens,MaSV'
        ]);

        Session::put('sinhvien', $request->MaSV);
        return redirect()->route('hocphan.index')->with('success', 'Đăng nhập thành công!');
    }

    public function logout()
    {
        Session::forget('sinhvien');
        return redirect()->route('login')->with('success', 'Đăng xuất thành công!');
    }
}
