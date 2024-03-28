<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KantorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('data_kantor')->insert([
            'nama_kantor' => 'Diskominfo',
            'latitude' => -7.332009384553485,
            'longitude' => 110.50127269821182,
            'radius' => 300
        ]);

        // Tambahkan data lain sesuai kebutuhan
    }
}
