<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFeesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fees', function (Blueprint $table) {
            $table->id('fee_id');
            $table->integer('fee');
            $table->integer('student_id');
            $table->integer('due_date');
            $table->integer('after_date');
            $table->integer('total_fee');
            $table->string('paid');
            $table->string('remaining');
            $table->string('fee_status');
            $table->string('discount');
            $table->string('feecollect');
            $table->string('fine');
            $table->string('month');
            $table->string('day');
            $table->string('year');
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
        Schema::dropIfExists('fees');
    }
}
