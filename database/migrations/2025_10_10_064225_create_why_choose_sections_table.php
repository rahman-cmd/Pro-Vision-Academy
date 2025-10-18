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
        Schema::create('why_choose_sections', function (Blueprint $table) {
            $table->id();
            $table->string('heading_title');
            $table->string('cover_image')->nullable();

            // Four feature cards (title + content)
            $table->string('card_title_1')->nullable();
            $table->text('card_content_1')->nullable();

            $table->string('card_title_2')->nullable();
            $table->text('card_content_2')->nullable();

            $table->string('card_title_3')->nullable();
            $table->text('card_content_3')->nullable();

            $table->string('card_title_4')->nullable();
            $table->text('card_content_4')->nullable();

            // Active/Inactive status
            $table->enum('status', ['active', 'inactive'])->default('active');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('why_choose_sections');
    }
};
