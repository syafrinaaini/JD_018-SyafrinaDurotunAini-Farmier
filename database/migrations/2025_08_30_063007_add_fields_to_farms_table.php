<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
{
    Schema::table('farms', function (Blueprint $table) {
        $table->text('description')->nullable();
        $table->string('livestock_type')->nullable();
        $table->string('photo')->nullable();
        $table->string('website')->nullable();
    });
}

public function down()
{
    Schema::table('farms', function (Blueprint $table) {
        $table->dropColumn(['description', 'livestock_type', 'photo', 'website']);
    });
}

};
