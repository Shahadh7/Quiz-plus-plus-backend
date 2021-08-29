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
            $table->id();
            $table->string('exam_name');
            $table->bigInteger('subject_id')->unsigned();
            $table->string('exam_secret')->unique();
            $table->time('duration');
            $table->date('date');
            $table->time('time');
            $table->timestamps();
        });

        Schema::table('exams', function ($table) {
            $table->foreign('subject_id')->references('id')->on('subjects')->onDelete('cascade');
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
