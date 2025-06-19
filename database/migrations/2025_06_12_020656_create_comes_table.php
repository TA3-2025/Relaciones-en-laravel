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
            Schema::create('come', function (Blueprint $table) {
                $table->id();
            $table->unsignedBigInteger('animal_id');
            $table->unsignedBigInteger('fruta_id');
            $table->foreign('animal_id')
                ->references('id')
                ->on('animales');
            $table->foreign('fruta_id')
                ->references('id')
                ->on('frutas');
            $table->unique(['animal_id', 'fruta_id']);
            $table -> softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('comes');
    }
};
