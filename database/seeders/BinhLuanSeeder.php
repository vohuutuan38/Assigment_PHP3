<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class BinhLuanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('binh_luans')->insert([
            [
                'tai_khoan_id' => 2,
                'san_pham_id' => 1,
                'noi_dung' => 'San pham tot',
                'thoi_gian' => Carbon::now(),
                'trang_thai' => true
            ],
            [
                'tai_khoan_id' => 2,
                'san_pham_id' => 2,
                'noi_dung' => 'San pham khong tot',
                'thoi_gian' => Carbon::now(),
                'trang_thai' => false
            ],
        ]);
    }
}
