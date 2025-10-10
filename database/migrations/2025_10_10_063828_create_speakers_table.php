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
        Schema::create('speakers', function (Blueprint $table) {
            $table->id();
            $table->string('full_name');
            $table->string('country');
            $table->string('specialization');
            $table->text('bio')->nullable();
            $table->string('image')->nullable();
            $table->string('title')->nullable(); // Dr., Prof., etc.
            $table->string('institution')->nullable();
            $table->text('achievements')->nullable();
            $table->enum('type', ['international', 'local'])->default('local');
            $table->string('linkedin')->nullable();
            $table->string('website')->nullable();
            $table->enum('status', ['active', 'inactive'])->default('active');
            $table->integer('sort_order')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('speakers');
    }
};
