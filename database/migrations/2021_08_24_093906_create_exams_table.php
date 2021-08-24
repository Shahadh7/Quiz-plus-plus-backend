<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateExamsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('exams', function (Blueprint $table) {
            $table->increments('exams_id')->unsigned();
            $table->string('exam_name');
            $table->integer('subject_id')->unsigned();
            $table->string('exam_secret')->unique();
            $table->time('duration');
            $table->date('date');
            $table->time('time');
            $table->timestamps();
        });

        Schema::table('exams', function ($table) {
            $table->foreign('subject_id')->references('subject_id')->on('subjects');
        });


    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('exams');
    }
}
