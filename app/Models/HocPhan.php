<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HocPhan extends Model {
    use HasFactory;

    protected $table = 'hoc_phans';
    protected $primaryKey = 'MaHP';
    public $timestamps = false;

    protected $fillable = ['TenHP', 'SoTinChi'];

    // Quan hệ với ChiTietDangKy
    public function chiTietDangKy() {
        return $this->hasMany(ChiTietDangKy::class, 'MaHP', 'MaHP');
    }
}
