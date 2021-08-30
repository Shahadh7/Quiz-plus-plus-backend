<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class AddSomeValuesToLevelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::table('levels')->insert([
            'level' => 'Grade 1',
        ]); 
        DB::table('levels')->insert([
            'level' => 'Grade 2',
        ]);   
        DB::table('levels')->insert([
            'level' => 'Grade 3',
        ]);   
        DB::table('levels')->insert([
            'level' => 'Grade 4',
        ]);   
        DB::table('levels')->insert([
            'level' => 'Grade 5',
        ]);   
        DB::table('levels')->insert([
            'level' => 'Grade 6',
        ]);     
        DB::table('levels')->insert([
            'level' => 'Grade 7',
        ]);   
        DB::table('levels')->insert([
            'level' => 'Grade 8',
        ]);   
    }
}
