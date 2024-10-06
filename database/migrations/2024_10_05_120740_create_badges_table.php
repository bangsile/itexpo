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
        Schema::create('badges', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained(
                table: 'users',
                indexName: 'users_id_foreign_badge',
                column: 'id'
            );
            $table->boolean('website')->default(false);
            $table->boolean('iot')->default(false);
            $table->boolean('mobile')->default(false);
            $table->boolean('cyber')->default(false);
            $table->boolean('multimedia')->default(false);
            $table->boolean('gis')->default(false);
            $table->boolean('game')->default(false);
            $table->boolean('network')->default(false);
            $table->boolean('troubleshoot')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('badges');
    }
};
