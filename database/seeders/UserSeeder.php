<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert(
            [
                [
                    'ho_ten' => 'Admin',
                    'email' => 'admin@gmail.com',
                    'so_dien_thoai' => '0123456789',
                    'gioi_tinh' => 'Nam',
                    'dia_chi' => 'Hà Nội',
                    'mat_khau' => '1',
                    'ngay_sinh' => now(),
                    'chuc_vu_id' => 1,
                    'trang_thai' => 1
                ],
                [
                    'ho_ten' => 'User',
                    'email' => 'user@gmail.com',
                    'so_dien_thoai' => '0987654321',
                    'gioi_tinh' => 'Nữ',
                    'dia_chi' => 'Hà Nội',
                    'mat_khau' => '1',
                    'ngay_sinh' => now(),
                    'chuc_vu_id' => 2,
                    'trang_thai' => 1
                ],
            ]
        );
    }
}
