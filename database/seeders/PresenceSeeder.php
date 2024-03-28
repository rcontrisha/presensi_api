<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PresenceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Masukkan data dari localhost phpMyAdmin
        $dataFromPhpMyAdmin = DB::connection('mysql')->table('presence_data')->get();

        // Loop melalui data dan masukkan ke dalam tabel presences di database Laravel
        foreach ($dataFromPhpMyAdmin as $data) {
            DB::table('presences')->insert([
                'nip' => $data->nip,
                'latitude' => $data->latitude,
                'longitude' => $data->longitude,
                'waktu' => $data->waktu,
                'device_id' => $data->device_id,
            ]);
        }
    }
}
