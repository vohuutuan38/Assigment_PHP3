<?php

namespace App\Models;

use App\Models\DanhMuc;
use App\Models\HinhAnhSanPham;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

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

   public function danhMuc () {
      return $this->belongsTo(DanhMuc::class);
   }

   public function hinhAnhSanPham(){
      return $this->hasMany(HinhAnhSanPham::class);
   }
}
