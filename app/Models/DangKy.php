<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DangKy extends Model {
    use HasFactory;

    protected $table = 'dang_kys';
    protected $primaryKey = 'MaDK';
    public $timestamps = false;

    protected $fillable = ['NgayDK', 'MaSV'];

    // Quan hệ với SinhVien
    public function sinhVien() {
        return $this->belongsTo(SinhVien::class, 'MaSV', 'MaSV');
    }

    // Quan hệ với ChiTietDangKy
    public function chiTietDangKy() {
        return $this->hasMany(ChiTietDangKy::class, 'MaDK', 'MaDK');
    }
}
