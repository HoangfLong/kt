
<h2>Thêm Sinh Viên</h2>
<a href="{{ route('sinhviens.index') }}" class="btn btn-secondary mb-3">Quay lại</a>

<form action="{{ route('sinhviens.store') }}" method="POST" enctype="multipart/form-data">
    @include('sinhviens.form')
</form>
