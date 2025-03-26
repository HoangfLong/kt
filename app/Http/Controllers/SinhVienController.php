<?php

namespace App\Http\Controllers;

use App\Models\SinhVien;
use App\Models\NganhHoc;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SinhVienController extends Controller
{
    // Hiển thị danh sách sinh viên
    public function index()
    {
        $sinhViens = SinhVien::with('nganhHoc')->paginate(10);
        return view('sinhviens.index', compact('sinhViens'));
    }

    // Hiển thị form tạo sinh viên
    public function create()
    {
        $nganhHocs = NganhHoc::all();
        return view('sinhviens.create', compact('nganhHocs'));
    }

    // Lưu sinh viên mới
    public function store(Request $request)
    {
        $request->validate([
            'HoTen' => 'required|string|max:255',
            'GioiTinh' => 'required|in:Nam,Nữ',
            'NgaySinh' => 'required|date',
            'MaNganh' => 'nullable|exists:nganh_hocs,MaNganh',
            'Hinh' => 'nullable|image|max:2048',
        ]);

        $data = $request->except('Hinh');

        if ($request->hasFile('Hinh')) {
            $data['Hinh'] = $request->file('Hinh')->store('sinhvien_images', 'public');
        }

        SinhVien::create($data);
        return redirect()->route('sinhviens.index')->with('success', 'Thêm sinh viên thành công');
    }

    // Hiển thị chi tiết sinh viên
    public function show($id)
    {
        $sinhvien = SinhVien::with('nganhHoc')->findOrFail($id);
        return view('sinhviens.show', compact('sinhvien'));
    }

    // Hiển thị form chỉnh sửa sinh viên
    public function edit($id)
    {
        $sinhvien = SinhVien::findOrFail($id);
        $nganhHocs = NganhHoc::all();
        return view('sinhviens.edit', compact('sinhvien', 'nganhHocs'));
    }

    // Cập nhật sinh viên
    public function update(Request $request, $id)
    {
        $sinhvien = SinhVien::findOrFail($id);

        $request->validate([
            'HoTen' => 'required|string|max:255',
            'GioiTinh' => 'required|in:Nam,Nữ',
            'NgaySinh' => 'required|date',
            'MaNganh' => 'required|exists:nganh_hocs,MaNganh',
            'Hinh' => 'nullable|image|max:2048',
        ]);

        $data = $request->except('Hinh');

        if ($request->hasFile('Hinh')) {
            if ($sinhvien->Hinh) {
                Storage::disk('public')->delete($sinhvien->Hinh);
            }
            $data['Hinh'] = $request->file('Hinh')->store('sinhvien_images', 'public');
        }

        $sinhvien->update($data);
        return redirect()->route('sinhviens.index')->with('success', 'Cập nhật sinh viên thành công');
    }

    // Xóa sinh viên
    public function destroy($id)
    {
        $sinhvien = SinhVien::findOrFail($id);

        if ($sinhvien->Hinh) {
            Storage::disk('public')->delete($sinhvien->Hinh);
        }

        $sinhvien->delete();
        return redirect()->route('sinhviens.index')->with('success', 'Xóa sinh viên thành công');
    }
}
