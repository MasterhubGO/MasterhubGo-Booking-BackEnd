<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMastersTable extends Migration
{
    public function up()
    {
        Schema::create('masters', function (Blueprint $table) {
            $table->foreignId('business_profile_id')->constrained('business_profiles')->cascadeOnDelete();
            $table->string('first_name');
            $table->string('last_name');
            $table->string('personal_website')->nullable();
            $table->string('diploma_photos')->nullable();
            $table->string('specialization')->nullable();
            $table->string('education')->nullable();
            $table->string('workplace')->nullable();
            $table->date('work_start_date')->nullable();
            $table->date('work_end_date')->nullable();
            $table->string('position')->nullable();
            $table->string('services')->nullable();
        });
    }

    public function down()
    {
        Schema::dropIfExists('masters');
    }
}
