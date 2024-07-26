<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class SanPham extends Model
{
    use HasFactory;
   protected $fillable = [
       'id',
       'ten_san_pham',
       'so_luong',
       'gia_san_pham',
       'gia_khuyen_mai',
       'ngay_nhap',
       'mo_ta',
       'danh_muc_id',
       'trang_thai',
       'hinh_anh',
    ];

 public function hinhAnhSanPham(){
    return $this->hasMany(HinhAnhSanPham::class);
 }
}
