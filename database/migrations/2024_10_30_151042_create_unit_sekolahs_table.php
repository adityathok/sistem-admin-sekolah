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
        Schema::create('unit_sekolahs', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('nama');
            $table->longText('alamat');
            $table->string('kecamatan');
            $table->string('kota');
            $table->string('nip_kepsek');
            $table->string('nama_kepsek');
            $table->string('nip_ka_tu');
            $table->string('nama_ka_tu');
            $table->string('nip_bendahara');
            $table->string('nama_bendahara');
            $table->string('email');
            $table->string('telepon');
            $table->string('whatsapp')->nullable();
            $table->string('logo')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('unit_sekolahs');
    }
};
