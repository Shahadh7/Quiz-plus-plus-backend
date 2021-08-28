<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class AddSomeValuesToUserTypeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::table('user_type')->insert([
            'type' => "admin"
        ]);
        DB::table('user_type')->insert([
            'type' => "instructor"
        ]);
        DB::table('user_type')->insert([
            'type' => "student"
        ]);
    }
}
