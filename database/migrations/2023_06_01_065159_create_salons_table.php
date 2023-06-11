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
        Schema::create('salons', function (Blueprint $table) {
            $table->foreignId('business_profile_id')->constrained('business_profiles')->cascadeOnDelete();
            $table->string('salon_name');
            $table->string('diploma_photos')->nullable();
            $table->string('services')->nullable();
            $table->string('subscriptions')->nullable();
            $table->string('followers')->nullable();
            $table->string('reviews')->nullable();
            $table->string('rating')->nullable();
            $table->string('publications')->nullable();
            $table->string('promotions')->nullable();
            $table->string('personal_info')->nullable();
            $table->integer('portfolio_count')->nullable();
            $table->string('courses')->nullable();
            $table->string('employees')->nullable();
            $table->string('notifications')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('salons');
    }
};
