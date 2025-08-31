<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
{
    Schema::table('livestocks', function (Blueprint $table) {
        $table->foreignId('farm_id')->constrained()->onDelete('cascade');
    });
}

public function down(): void
{
    Schema::table('livestocks', function (Blueprint $table) {
        $table->dropForeign(['farm_id']);
        $table->dropColumn('farm_id');
    });
}
};
