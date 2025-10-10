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
        Schema::create('courses', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('description');
            $table->decimal('price', 10, 2);
            $table->decimal('early_bird_price', 10, 2)->nullable();
            $table->date('early_bird_deadline')->nullable();
            $table->date('start_date');
            $table->date('end_date')->nullable();
            $table->string('duration')->nullable();
            $table->string('location')->nullable();
            $table->integer('max_participants')->nullable();
            $table->integer('current_participants')->default(0);
            $table->string('level')->nullable(); // beginner, intermediate, advanced
            $table->string('category')->nullable();
            $table->string('image')->nullable();
            $table->text('objectives')->nullable();
            $table->text('requirements')->nullable();
            $table->enum('status', ['active', 'inactive', 'completed', 'cancelled'])->default('active');
            $table->boolean('is_featured')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('courses');
    }
};
