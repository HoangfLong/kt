
<h2>Thông Tin Chi Tiết Sinh Viên</h2>
<a href="{{ route('sinhviens.index') }}" class="btn btn-secondary mb-3">Quay lại</a>

<div class="card">
    <div class="card-body">
        <h5 class="card-title">{{ $sinhvien->HoTen }}</h5>
        <p><strong>Mã SV:</strong> {{ $sinhvien->MaSV }}</p>
        <p><strong>Giới Tính:</strong> {{ $sinhvien->GioiTinh }}</p>
        <p><strong>Ngày Sinh:</strong> {{ $sinhvien->NgaySinh }}</p>
        <p><strong>Ngành:</strong> {{ $sinhvien->nganhHoc->TenNganh ?? 'N/A' }}</p>
        <p>
            <strong>Hình:</strong>  
            @if($sinhvien->Hinh)
                <img src="{{ asset('storage/'.$sinhvien->Hinh) }}" width="100">
            @else
                Không có ảnh
            @endif
        </p>
    </div>
</div>

