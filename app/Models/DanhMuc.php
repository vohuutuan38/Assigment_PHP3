<?php

namespace App\Models;

use App\Models\SanPham;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class DanhMuc extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'hinh_anh',
        'ten_danh_muc',
        'mo_ta'
    ];

    public function sanPham () {
        return $this->hasMany(SanPham::class);
    }
}
