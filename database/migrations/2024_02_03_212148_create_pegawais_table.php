<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    // database/migrations/timestamp_create_pegawais_table.php

    public function up()
    {
        Schema::create('pegawais', function (Blueprint $table) {
            $table->id();
            $table->string('nip')->unique();
            $table->string('nama');
            $table->string('email')->unique();
            $table->string('password');
            $table->string('device_id');
            $table->timestamps();
        });
    }


    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pegawais');
    }
};
