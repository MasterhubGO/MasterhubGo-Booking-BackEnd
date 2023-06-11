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
        Schema::create('business_profiles', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->cascadeOnDelete();
            $table->foreignId('role_id')->constrained('business_roles')->cascadeOnDelete();
            $table->string('photo')->nullable();
            $table->string('banner')->nullable();
            $table->string('phone')->nullable();
            $table->string('personal_site')->nullable();
            $table->string('address')->nullable();
            $table->string('email')->nullable();
            $table->string('profile_description')->nullable();
            $table->string('social_links')->nullable();
            $table->boolean('verified')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('business_profiles');
    }
};
