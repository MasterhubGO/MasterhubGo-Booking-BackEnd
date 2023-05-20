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
			$table->unsignedBigInteger('price')->before('created_at');
			$table->foreignId('currency_id')
				->constrained('currencies')
				->cascadeOnUpdate()
				->cascadeOnDelete()
				->before('created_at');
			$table->foreignId('user_id')
				->constrained('users')
				->cascadeOnUpdate()
				->cascadeOnDelete()
				->before('created_at');
			$table->text('description')->nullable()->before('created_at');
			$table->unsignedMediumInteger('duration')->before('created_at');
			$table->boolean('is_field')->before('created_at');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('business_services', function (Blueprint $table) {
            $table->dropColumn(['price', 'description', 'duration', 'is_field']);
			$table->dropConstrainedForeignId('currency_id');
			$table->renameColumn('title', 'service');
        });
    }
};
