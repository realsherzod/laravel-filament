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
        Schema::table('catalogs', function (Blueprint $table) {
            $table->text('description_uz')->change();
            $table->text('description_ru')->change();
            $table->text('description_en')->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('catalogs', function (Blueprint $table) {
            $table->string('description_uz')->change();
            $table->string('description_ru')->change();
            $table->string('description_en')->change();
        });
    }
};
