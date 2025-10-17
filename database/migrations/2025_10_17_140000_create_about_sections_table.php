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
        Schema::create('about_sections', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('content');
            // Three feature items stored as discrete columns to match model
            $table->string('item_one_title')->nullable();
            $table->text('item_one_content')->nullable();
            $table->string('item_two_title')->nullable();
            $table->text('item_two_content')->nullable();
            $table->string('item_three_title')->nullable();
            $table->text('item_three_content')->nullable();
            $table->enum('status', ['active', 'inactive'])->default('active');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('about_sections');
    }
};