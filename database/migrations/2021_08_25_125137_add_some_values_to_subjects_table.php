<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class AddSomeValuesToSubjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::table('subjects')->insert([
            'name' => "English"
        ]);
        DB::table('subjects')->insert([
            'name' => "Tamil"
        ]);
        DB::table('subjects')->insert([
            'name' => "Maths"
        ]);
        DB::table('subjects')->insert([
            'name' => "Science"
        ]);
        DB::table('subjects')->insert([
            'name' => "ICT"
        ]);
        DB::table('subjects')->insert([
            'name' => "History"
        ]);
        DB::table('subjects')->insert([
            'name' => "Goegraphy"
        ]);
    }
}
