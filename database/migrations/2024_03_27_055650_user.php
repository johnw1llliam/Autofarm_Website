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
        // Create User table
        Schema::create('User', function (Blueprint $table) {
            $table->increments('UserID');
            $table->binary('ProfilePicture')->nullable();
            $table->string('Name', 50);
            $table->string('Username', 50);
            $table->char('Password', 60);
            $table->string('Email', 50);
            $table->text('Biodata')->nullable();
            $table->float('Latitude')->nullable();
            $table->float('Longitude')->nullable();
            $table->float('JumlahPakan')->default(0);
            $table->float('JumlahAir')->default(0);
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
