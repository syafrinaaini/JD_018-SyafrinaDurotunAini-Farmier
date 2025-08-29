<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('livestocks', function (Blueprint $table) {
            $table->id();
            $table->string('jenis');              // contoh: Kambing, Sapi, Domba
            $table->string('ras');                // contoh: Etawa, PO, Texel
            $table->unsignedInteger('stok')->default(0);
            $table->string('image_path')->nullable(); // simpan path gambar
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('livestocks');
    }
};
