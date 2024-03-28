<?php

// database/seeders/PegawaiSeeder.php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class PegawaiSeeder extends Seeder
{
    public function run()
    {
        $dataFromPhpMyAdmin = DB::connection('mysql')->table('pegawai')->get();

        foreach ($dataFromPhpMyAdmin as $data) {
            unset($data->id); // Remove the 'id' column

            // Set the 'created_at' and 'updated_at' values
            $now = Carbon::now()->toDateTimeString();
            $data->created_at = $now;
            $data->updated_at = $now;

            DB::table('pegawais')->insert((array) $data);
        }
    }
}
