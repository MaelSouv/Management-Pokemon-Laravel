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
        Schema::create('pokemon', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('japanese_name')->nullable();
            $table->integer('pokedex_number')->unique();
            $table->integer('generation');
            $table->boolean('is_legendary')->default(false);
            $table->string('type1');
            $table->string('type2')->nullable();
            $table->integer('hp');
            $table->integer('attack');
            $table->integer('sp_attack');
            $table->integer('defense');
            $table->integer('sp_defense');
            $table->integer('speed');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pokemon');
    }
};
