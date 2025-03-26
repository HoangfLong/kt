
<h2>Chỉnh Sửa Sinh Viên</h2>
<a href="{{ route('sinhviens.index') }}" class="btn btn-secondary mb-3">Quay lại</a>

<form action="{{ route('sinhviens.update', $sinhvien->MaSV) }}" method="POST" enctype="multipart/form-data">
    @method('PUT')
    @include('sinhviens.form', ['sinhVien' => $sinhvien])
</form>

