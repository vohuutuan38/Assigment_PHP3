<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

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
                    'id' => 1,
                    'ho_ten' => 'Admin',
                    'email' => 'admin@gmail.com',
                    'so_dien_thoai' => '0123456789',
                    'gioi_tinh' => 'Nam',
                    'dia_chi' => 'Hà Nội',
                    'ngay_sinh' => Carbon::now(),
                    'mat_khau' => '1',
                    'chuc_vu_id' => 1,
                    'trang_thai' => true
                ],
                [
                    'id' => 2,
                    'ho_ten' => 'User',
                    'email' => 'user@gmail.com',
                    'so_dien_thoai' => '0987654321',
                    'gioi_tinh' => 'Nữ',
                    'dia_chi' => 'Hà Nội',
                    'ngay_sinh' => Carbon::now(),
                    'mat_khau' => '1',
                    'chuc_vu_id' => 2,
                    'trang_thai' => true
                ]
            ]
        );
    }
}
