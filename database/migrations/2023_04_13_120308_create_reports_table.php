<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reports', function (Blueprint $table) {
            $table->id();
            $table->integer('image_id')->nullable();
            $table->integer('child_parent_id');
            $table->integer('doctor_id');
            $table->string('child_name');
            $table->string('child_image')->nullable();
            $table->string('father_name');
            $table->string('mother_name');
            $table->string('national_id');
            $table->string('blood_type');
            $table->string('age');
            $table->string('birthday');
            $table->string('weight');
            $table->string('height');
            $table->string('started_in');
            $table->string('last_time');
            $table->string('diagnosis');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('reports');
    }
};
