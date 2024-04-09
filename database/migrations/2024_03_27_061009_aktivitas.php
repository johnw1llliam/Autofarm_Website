<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // Create Aktivitas table   
        Schema::create('Aktivitas', function (Blueprint $table) {
            $table->increments('AktivitasID');
            $table->unsignedInteger('KandangID');
            $table->foreign('KandangID')->references('KandangID')->on('Kandang');
            $table->float('JumlahPakan')->default(0);
            $table->float('JumlahAir')->default(0);
            $table->float('JumlahVaksin')->default(0);
            $table->dateTime('Waktu')->timestamp();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
