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
        Schema::create('events', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('church_name')->nullable();
            $table->string('guest_speaker')->nullable();
            $table->string('theme')->nullable();
            $table->string('verse_chapter')->nullable();
            $table->string('content', 3000)->nullable();
            $table->string('desc', 3000)->nullable();
            $table->string('date');
            $table->string('image')->nullable();
            $table->string('likes')->nullable();
            $table->string('comments', 3000)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('events');
    }
};
