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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('first_name');
            $table->string('last_name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('phone');
            $table->date('date_of_birth');
            $table->enum('gender', ['male', 'female', 'other', 'prefer_not_to_say']);
            
            // Dental-specific fields
            $table->string('nationality');
            $table->boolean('whatsapp_available')->default(false);
            $table->enum('clinical_experience', ['1-4', '5-9', '10+']);
            $table->enum('oman_license', ['yes', 'no']);
            $table->string('dental_degree');
            $table->string('graduation_institute');
            $table->year('graduation_year')->nullable();
            $table->string('current_workplace')->nullable();
            $table->enum('implantology_experience', ['very_little_to_none', 'basic', 'intermediate', 'advanced']);
            $table->string('how_heard_about_course')->nullable();
            $table->text('enrollment_reason')->nullable();
            
            $table->enum('role', ['admin', 'student', 'instructor'])->default('student');
            $table->enum('status', ['active', 'inactive', 'suspended'])->default('active');
            $table->rememberToken();
            $table->timestamps();
        });

        Schema::create('password_reset_tokens', function (Blueprint $table) {
            $table->string('email')->primary();
            $table->string('token');
            $table->timestamp('created_at')->nullable();
        });

        Schema::create('sessions', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->foreignId('user_id')->nullable()->index();
            $table->string('ip_address', 45)->nullable();
            $table->text('user_agent')->nullable();
            $table->longText('payload');
            $table->integer('last_activity')->index();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
        Schema::dropIfExists('password_reset_tokens');
        Schema::dropIfExists('sessions');
    }
};
