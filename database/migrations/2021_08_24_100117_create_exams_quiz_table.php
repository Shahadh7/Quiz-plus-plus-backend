<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateExamsQuizTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('exams_quiz', function (Blueprint $table) {
            $table->integer('exam_id')->unsigned();
            $table->integer('quiz_id')->unsigned();
            $table->timestamps();
        });
        
        Schema::table('exams_quiz', function ($table) {
            $table->foreign('exam_id')->references('exams_id')->on('exams');
            $table->foreign('quiz_id')->references('quiz_id')->on('quizs');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('exams_quiz');
    }
}
