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
        Schema::table('business_services', function (Blueprint $table) {
			$table->renameColumn('service', 'title');
			$table->unsignedBigInteger('price');
			$table->string('currency', 10);
			$table->text('description')->nullable();
			$table->unsignedMediumInteger('duration');
			$table->boolean('is_field');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('business_services', function (Blueprint $table) {
            //
        });
    }
};
