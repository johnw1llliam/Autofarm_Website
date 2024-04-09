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
        // Create Kandang table
        Schema::create('Kandang', function (Blueprint $table) {
            $table->increments('KandangID');
            $table->unsignedInteger('UserID');
            $table->foreign('UserID')->references('UserID')->on('User');
            $table->string('NamaKandang', 50)->default("Poultry 1");
            $table->integer('JumlahAyam')->default(0);
            $table->float('TotalPakan')->default(0);
            $table->float('TotalAir')->default(0);
            $table->float('TotalVaksin')->default(0);
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
