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
    public function up()
    {
        Schema::create('data_kantor', function (Blueprint $table) {
            $table->id();
            $table->string('nama_kantor');
            $table->double('latitude', 10, 8);
            $table->double('longitude', 11, 8);
            $table->string('radius');
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
        Schema::dropIfExists('data_kantor');
    }
};
