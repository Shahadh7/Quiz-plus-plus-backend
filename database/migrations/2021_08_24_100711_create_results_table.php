<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateResultsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('results', function (Blueprint $table) {
            $table->increments('result_id')->unsigned();
            $table->integer('user_id')->unsigned();
            $table->integer('exams_id')->unsigned();
            $table->integer('result');
            $table->timestamps();
        });

        Schema::table('results', function($table) {
            $table->foreign('user_id')->references('user_id')->on('users');
            $table->foreign('exams_id')->references('exams_id')->on('exams');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('results');
    }
}
