<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAnswersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('answers', function (Blueprint $table) {
            $table->increments('answer_id')->unsigned();
            $table->text('answer');
            $table->integer('quiz_id')->unsigned();
            $table->boolean('is_answer');
            $table->timestamps();
        });

        Schema::table('answers', function($table) {
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
        Schema::dropIfExists('answers');
    }
}
