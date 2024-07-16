<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class DanhMucSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('danh_mucs')->insert([
            [
                'id' => 1,
                'ten_danh_muc' => 'Iphone',
                'mo_ta' => 'Dien thoai iphone'
            ],
            [
                'id' => 2,
                'ten_danh_muc' => 'Samsung',
                'mo_ta' => 'Dien thoai Samsung'
            ]
        ]);
    }
}
