<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class SanPhamSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('san_phams')->insert([
            [
                'id' => 1,
                'ten_san_pham' => 'Iphone 15',
                'so_luong' => 5,
                'gia_san_pham' => 35000000,
                'gia_khuyen_mai' => 30000000,
                'ngay_nhap' => Carbon::now(),
                'mo_ta' => 'RAM: 258GB, ROM: 8GB',
                'danh_muc_id' => 1,
                'trang_thai' => true                    
            ],
            [
                'id' => 2,
                'ten_san_pham' => 'Iphone 14',
                'so_luong' => 5,
                'gia_san_pham' => 25000000,
                'gia_khuyen_mai' => 20000000,
                'ngay_nhap' => Carbon::now(),
                'mo_ta' => 'RAM: 258GB, ROM: 8GB',
                'danh_muc_id' => 1,
                'trang_thai' => true                    
            ]
        ]);

    }
}
