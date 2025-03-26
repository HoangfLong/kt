<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChiTietDangKy extends Model {
    use HasFactory;

    protected $table = 'chi_tiet_dang_kys';
    protected $primaryKey = null;
    public $incrementing = false;
    public $timestamps = false;

    protected $fillable = ['MaDK', 'MaHP'];

    // Quan hệ với Đăng Ký
    public function dangKy() {
        return $this->belongsTo(DangKy::class, 'MaDK', 'MaDK');
    }

    // Quan hệ với Học Phần
    public function hocPhan() {
        return $this->belongsTo(HocPhan::class, 'MaHP', 'MaHP');
    }
}
