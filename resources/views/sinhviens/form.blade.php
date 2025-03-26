@csrf
<div class="mb-3">
    <label class="form-label">Họ Tên</label>
    <input type="text" name="HoTen" class="form-control" value="{{ old('HoTen', $sinhVien->HoTen ?? '') }}">
</div>

<div class="mb-3">
    <label class="form-label">Giới Tính</label>
    <select name="GioiTinh" class="form-control">
        <option value="Nam" {{ (old('GioiTinh', $sinhVien->GioiTinh ?? '') == 'Nam') ? 'selected' : '' }}>Nam</option>
        <option value="Nữ" {{ (old('GioiTinh', $sinhVien->GioiTinh ?? '') == 'Nữ') ? 'selected' : '' }}>Nữ</option>
    </select>
</div>

<div class="mb-3">
    <label class="form-label">Ngày Sinh</label>
    <input type="date" name="NgaySinh" class="form-control" value="{{ old('NgaySinh', $sinhVien->NgaySinh ?? '') }}">
</div>

<div class="mb-3">
    <label class="form-label">Ngành Học</label>
    <select name="MaNganh" class="form-control">
        @foreach ($nganhHocs as $nganh)
            <option value="{{ $nganh->MaNganh }}" 
                {{ (old('MaNganh', $sinhVien->MaNganh ?? '') == $nganh->MaNganh) ? 'selected' : '' }}>
                {{ $nganh->TenNganh }}
            </option>
        @endforeach
    </select>
</div>

<div class="mb-3">
    <label class="form-label">Hình Ảnh</label>
    <input type="file" name="Hinh" class="form-control">
    @if(isset($sinhVien) && $sinhVien->Hinh)
        <img src="{{ asset('storage/'.$sinhVien->Hinh) }}" width="100">
    @endif
</div>

<button type="submit" class="btn btn-success">Lưu</button>
