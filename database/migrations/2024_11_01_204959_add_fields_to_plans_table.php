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
        Schema::table('plans', function (Blueprint $table) {
            $table->string('interval')->nullable();
            $table->string('currency')->nullable();
            $table->string('price')->nullable();
            $table->string('price_description')->nullable();
            $table->string('description')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('plans', function (Blueprint $table) {
            $table->dropColumn('interval');
            $table->dropColumn('currency');
            $table->dropColumn('price');
            $table->dropColumn('price_description');
            $table->dropColumn('description');
        });
    }
};
