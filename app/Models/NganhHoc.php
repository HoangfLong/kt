<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NganhHoc extends Model {
    use HasFactory;

    protected $table = 'nganh_hocs';
    protected $primaryKey = 'MaNganh';
    public $timestamps = false;

    protected $fillable = ['TenNganh'];

    // Quan hệ với SinhVien
    public function sinhViens() {
        return $this->hasMany(SinhVien::class, 'MaNganh', 'MaNganh');
    }
}
