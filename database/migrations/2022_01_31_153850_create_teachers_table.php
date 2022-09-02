<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTeachersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('teachers', function (Blueprint $table) {
            $table->id();
            $table->string('teacher_name');
            $table->string('father_name');
            $table->string('phone');
            $table->string('watsapp');
            $table->string('blood_group');
            $table->string('school_joining_date');
            $table->string('present_address');
            $table->string('permanent_address');
            $table->string('qualification');
            $table->string('skill');
            $table->string('sallery');
            $table->string('bank_account_number');
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
        Schema::dropIfExists('teachers');
    }
}
