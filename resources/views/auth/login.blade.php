<div class="container">
    <h2>ĐĂNG NHẬP</h2>
    <form action="{{ route('login') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="MaSV">MaSV</label>
            <input type="text" class="form-control" name="MaSV" required>
        </div>
        <button type="submit" class="btn btn-primary">Đăng Nhập</button>
    </form>
</div>