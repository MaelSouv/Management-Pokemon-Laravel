<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('decks', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->cascadeOnDelete();
            $table->string('name');
            $table->unsignedBigInteger('slot1')->nullable();
            $table->unsignedBigInteger('slot2')->nullable();
            $table->unsignedBigInteger('slot3')->nullable();
            $table->unsignedBigInteger('slot4')->nullable();
            $table->unsignedBigInteger('slot5')->nullable();
            $table->unsignedBigInteger('slot6')->nullable();
            $table->timestamps();

            $table->index('user_id');
        });

        Schema::table('decks', function (Blueprint $table) {
            $table->foreign('slot1')->references('id')->on('pokemon')->nullOnDelete()->cascadeOnUpdate();
            $table->foreign('slot2')->references('id')->on('pokemon')->nullOnDelete()->cascadeOnUpdate();
            $table->foreign('slot3')->references('id')->on('pokemon')->nullOnDelete()->cascadeOnUpdate();
            $table->foreign('slot4')->references('id')->on('pokemon')->nullOnDelete()->cascadeOnUpdate();
            $table->foreign('slot5')->references('id')->on('pokemon')->nullOnDelete()->cascadeOnUpdate();
            $table->foreign('slot6')->references('id')->on('pokemon')->nullOnDelete()->cascadeOnUpdate();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('decks');
    }
};
