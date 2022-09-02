<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('students', function (Blueprint $table) {
            $table->id();
            $table->string('student_name');
            $table->string('student_urdu');
            $table->string('father_name');
            $table->string('father_urdu');
            $table->string('phone');
            $table->string('emergencyphone');
            $table->string('address');
            $table->string('permanentphone');
            $table->string('dateofbirth');
            $table->string('dateofadmission');
            $table->unsignedBigInteger('program_id');
            $table->foreign('program_id')->references('program_id')->on('programs');
            $table->unsignedBigInteger('class_id');
            $table->foreign('class_id')->references('class_id')->on('classes');
            // $table->unsignedBigInteger('section_id');
            // $table->foreign('section_id')->references('section_id')->on('sections');
            $table->integer('rollno');
            $table->string('admissionfee');
            $table->string('remainingadmissionfee');
            $table->string('admissionfeegiven');
            $table->string('tutionfee');
            $table->string('status');
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
        Schema::dropIfExists('students');
    }
}
