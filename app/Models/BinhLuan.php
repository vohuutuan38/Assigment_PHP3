<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class BinhLuan extends Model
{
    use HasFactory;

    public function getAll () {
        $binh_luans = DB::table('binh_luans')
                        ->join('users', 'binh_luans.tai_khoan_id', '=', 'users.id')
                        ->join('san_phams', 'binh_luans.san_pham_id', '=', 'san_phams.id')
                        ->select('binh_luans.*', 'users.ho_ten', 'san_phams.ten_san_pham')
                        ->get();

        return $binh_luans;
    }

    public function getById ($id) {
        $binh_luans = DB::table('binh_luans')
                        ->join('users', 'binh_luans.tai_khoan_id', '=', 'users.id')
                        ->join('san_phams', 'binh_luans.san_pham_id', '=', 'san_phams.id')
                        ->where('binh_luans.id', $id)
                        ->select('binh_luans.*', 'users.ho_ten', 'san_phams.ten_san_pham')
                        ->first();

        return $binh_luans;
    }

    public function updateBinhLuan ($data, $id) {
        DB::table('binh_luans')
            ->where('id', $id)
            ->update($data);

    }

    public function deleteBinhLuan ($id) {
        DB::table('binh_luans')
            ->where('id', $id)
            ->delete();
    }

    protected $fillable = [
        'id',
        'tai_khoan_id',
        'san_pham_id',
        'noi_dung',
        'thoi_gian',
        'trang_thai'
    ];
}
