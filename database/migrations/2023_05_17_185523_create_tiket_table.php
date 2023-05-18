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
        Schema::create('tiket', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('tiket_code')->nullable();
            $table->string('maskapai')->nullable();
            $table->string('start_city')->nullable();
            $table->string('city_destination')->nullable();
            $table->string('harga')->nullable();
            $table->bigInteger('transit')->nullable();
            $table->string('total_penumpang')->nullable();
            $table->time('waktu_penerbangan')->nullable();
            $table->dateTime('jam_penerbangan')->nullable();
            $table->enum('class', ['1', '2', '3', '4'])->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tiket');
    }
};
