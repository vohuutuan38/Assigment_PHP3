<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ChucVuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('chuc_vus')->insert(
            [
                [
                    'ten_chuc_vu' => 'Admin',
                ],
                [
                    'ten_chuc_vu' => 'User',
                ],
            ]
        );
    }
}
