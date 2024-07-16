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
                    'id' => 1,
                    'ten_chuc_vu' => 'Admin',
                ],
                [
                    'id' => 2,
                    'ten_chuc_vu' => 'User'
                ],
            ]
        );
    }
}
