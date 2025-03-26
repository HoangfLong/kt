<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SinhVien extends Model
{
    use HasFactory;
    
    protected $table = 'sinh_viens';
    protected $primaryKey = 'MaSV';
    public $incrementing = false;
    public $timestamps = false;

    protected $fillable = ['MaSV', 'HoTen', 'GioiTinh', 'NgaySinh', 'Hinh', 'MaNganh'];

    public function nganhHoc()
    {
        return $this->belongsTo(NganhHoc::class, 'MaNganh', 'MaNganh');
    }
}