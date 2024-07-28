<?php

namespace App\Models;

use App\Models\SanPham;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class HinhAnhSanPham extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'san_pham_id',
        'hinh_anh',
    ];

    public function sanPham(){
        return $this->belongsTo(SanPham::class);
     }
}
