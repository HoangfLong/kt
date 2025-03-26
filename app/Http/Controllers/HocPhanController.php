<?php

namespace App\Http\Controllers;

use App\Models\ChiTietDangKy;
use App\Models\DangKy;
use Illuminate\Http\Request;
use App\Models\HocPhan;
use Illuminate\Support\Facades\Session;

class HocPhanController extends Controller
{
    public function index()
    {
        $hocPhans = HocPhan::all();
        return view('hocphan.index', compact('hocPhans'));
    }

    public function dangKy($maHP)
    {
        // Kiểm tra sinh viên đã đăng nhập chưa
        if (!Session::has('sinhvien')) {
            return redirect()->route('login')->with('error', 'Bạn cần đăng nhập trước!');
        }

        $maSV = Session::get('sinhvien');

        // Kiểm tra xem sinh viên này đã có bản ghi trong bảng `DangKy` chưa
        $dangKy = DangKy::where('MaSV', $maSV)->first();

        if (!$dangKy) {
            // Nếu chưa có, tạo mới bản ghi trong `DangKy`
            $dangKy = DangKy::create([
                'MaSV' => $maSV,
                'NgayDK' => now(),
            ]);
        }

        // Kiểm tra sinh viên đã đăng ký học phần này chưa
        $daDangKy = ChiTietDangKy::where('MaDK', $dangKy->MaDK)
                                 ->where('MaHP', $maHP)
                                 ->exists();

        if ($daDangKy) {
            return redirect()->back()->with('error', 'Bạn đã đăng ký học phần này rồi!');
        }

        // Lưu thông tin vào bảng `ChiTietDangKy`
        ChiTietDangKy::create([
            'MaDK' => $dangKy->MaDK,
            'MaHP' => $maHP
        ]);

        return redirect()->back()->with('success', 'Đăng ký học phần thành công!');
    }
}
