
<div class="container">
    <h2 class="text-center">Danh Sách Sinh Viên</h2>
    <a href="{{ route('sinhviens.create') }}" class="btn btn-success mb-3">Thêm Sinh Viên</a>
    <a href="{{ route('hocphan.index') }}" class="btn btn-success mb-3">Dang Ky</a>
    <table class="table table-bordered text-center">
        <thead class="thead-dark">
            <tr>
                <th>Mã SV</th>
                <th>Họ Tên</th>
                <th>Giới Tính</th>
                <th>Ngày Sinh</th>
                <th>Hình</th>
                <th>Ngành</th>
                <th>Hành Động</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($sinhViens as $sv)
            <tr>
                <td>{{ $sv->MaSV }}</td>
                <td>{{ $sv->HoTen }}</td>
                <td>{{ $sv->GioiTinh }}</td>
                <td>{{ $sv->NgaySinh }}</td>
                <td>
                    @if($sv->Hinh)
                        <img src="{{ asset('storage/' . $sv->Hinh) }}" width="50" height="50" alt="Hình SV">
                    @else
                        Không có ảnh
                    @endif
                </td>
                <td>{{ $sv->nganhHoc->TenNganh }}</td>
                <td>
                    <a href="{{ route('sinhviens.show', $sv->MaSV) }}" class="btn btn-info btn-sm">Chi Tiết</a>
                    <a href="{{ route('sinhviens.edit', $sv->MaSV) }}" class="btn btn-warning btn-sm">Sửa</a>
                    <form action="{{ route('sinhviens.destroy', $sv->MaSV) }}" method="POST" style="display:inline;">
                        @csrf @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Xác nhận xóa?')">Xóa</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
