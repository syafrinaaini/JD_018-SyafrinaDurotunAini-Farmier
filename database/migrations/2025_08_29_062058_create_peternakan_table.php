<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('peternaks', function (Blueprint $table) {
            $table->id();
            $table->string('nama_peternak');       // Nama orang
            $table->string('nama_peternakan');    // Nama usaha/peternakan
            $table->string('email')->nullable();
            $table->string('nomor_hp')->nullable();
            $table->text('alamat');               // Alamat lengkap
            $table->text('keterangan')->nullable(); // Keterangan tambahan
            $table->timestamps();
        });
    }

    public function down(): void {
        Schema::dropIfExists('peternaks');
    }
};
