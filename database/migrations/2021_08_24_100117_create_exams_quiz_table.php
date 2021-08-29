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
        Schema::create('exam_quiz', function (Blueprint $table) {
            $table->bigInteger('exam_id')->unsigned();
            $table->bigInteger('quiz_id')->unsigned();
            
            $table->timestamps();
        });
        
        Schema::table('exam_quiz', function ($table) {
            $table->foreign('exam_id')->references('id')->on('exams')->onDelete('cascade');
            $table->foreign('quiz_id')->references('id')->on('quizs')->onDelete('cascade');
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
