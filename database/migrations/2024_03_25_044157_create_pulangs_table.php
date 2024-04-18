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
        Schema::create('pulangs', function (Blueprint $table) {
            $table->id();
            $table->integer('id_pasien');
            $table->integer('id_dokter');
            $table->date('tanggal_daftar');
            $table->date('tanggal_pulang');
            $table->string('diagnosis');
            $table->string('tindakan');
            $table->string('resep');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pulangs');
    }
};
