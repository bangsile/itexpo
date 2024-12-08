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
            $table->boolean('Website')->default(false);
            $table->boolean('IoT')->default(false);
            $table->boolean('Mobile')->default(false);
            $table->boolean('Cyber')->default(false);
            $table->boolean('Multimedia')->default(false);
            $table->boolean('GIS')->default(false);
            $table->boolean('Game')->default(false);
            $table->boolean('Network')->default(false);
            $table->boolean('Troubleshooting')->default(false);
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
