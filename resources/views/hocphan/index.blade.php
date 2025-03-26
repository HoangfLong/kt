<div class="container mt-4">
    <h2 class="text-center mb-4">📚 DANH SÁCH HỌC PHẦN</h2>

    <table class="table table-bordered text-center shadow-sm">
        <thead class="table-dark">
            <tr>
                <th>Mã Học Phần</th>
                <th>Tên Học Phần</th>
                <th>Số Tín Chỉ</th>
                <th>Hành Động</th>
            </tr>
        </thead>
        <tbody id="hocPhanTable">
            @foreach ($hocPhans as $hp)
            <tr>
                <td><strong>{{ $hp->MaHP }}</strong></td>
                <td>{{ $hp->TenHP }}</td>
                <td><span class="badge bg-primary p-2">{{ $hp->SoTinChi }} tín chỉ</span></td>
                <td>
                    <a href="{{ route('hocphan.dangky', $hp->MaHP) }}" class="btn btn-success btn-sm fw-bold">
                        ✅ Đăng Ký
                    </a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
