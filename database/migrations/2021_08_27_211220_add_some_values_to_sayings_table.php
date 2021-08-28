<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class AddSomeValuesToSayingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        DB::table('sayings')->insert([
            'saying' => 'Women are one half of society which gives birth to the other half so it is as if they are the entire society.',
            'author' => 'Ibn Qayyim Al-Jawziyya'
        ]);
        DB::table('sayings')->insert([
            'saying' => 'As long as you are performing prayer, you are knocking at the door of Allah, and whoever is knocking at the door of Allah, Allah will open it for him.',
            'author' => 'Ibn Qayyim Al-Jawziyya'
        ]);
        DB::table('sayings')->insert([
            'saying' => "A person's tongue can give you the taste of his heart.",
            'author' => 'Ibn Qayyim Al-Jawziyya'
        ]);
        DB::table('sayings')->insert([
            'saying' => 'This wordly life is like a shadow. If you try to catch it, you will never be able to do so. If you turn your back towards it, it has no choice but to follow you.',
            'author' => 'Ibn Qayyim Al-Jawziyya'
        ]);
        DB::table('sayings')->insert([
            'saying' => 'Happiness is attained by three things: being patient when tested, being thankful when receiving a blessing, and being repentant upon sinning.',
            'author' => 'Ibn Qayyim Al-Jawziyya'
        ]);
        DB::table('sayings')->insert([
            'saying' => 'Sins have many side-effects. One of them is that they steal knowledge from you.',
            'author' => 'Ibn Qayyim Al-Jawziyya'
        ]);
        DB::table('sayings')->insert([
            'saying' => 'Losing time is harder than death, as losing time keeps you away from Allah and the Hereafter, while death keeps you away from the worldly life and people.',
            'author' => 'Ibn Qayyim Al-Jawziyya'
        ]);
        DB::table('sayings')->insert([
            'saying' => 'As long as one is following the right way, one should never be concerned about the reproaches of those who like to find faults.',
            'author' => 'Ibn Qayyim Al-Jawziyya'
        ]);
        DB::table('sayings')->insert([
            'saying' => 'If the heart becomes hardened, the eye becomes dry.',
            'author' => 'Ibn Qayyim Al-Jawziyya'
        ]);
        DB::table('sayings')->insert([
            'saying' => 'Speech remains as a slave to you, but the moment it leaves your mouth, you become its slave.',
            'author' => 'Ibn Qayyim Al-Jawziyya'
        ]);
        DB::table('sayings')->insert([
            'saying' => 'And if a person were given all of the world and what is in it, it would not fill his emptiness.',
            'author' => 'Ibn Qayyim Al-Jawziyya'
        ]); 
        DB::table('sayings')->insert([
            'saying' => 'Sitting with the poor and less fortunate people removes the ego and pride from your heart.',
            'author' => 'Ibn Qayyim Al-Jawziyya'
        ]); 
        DB::table('sayings')->insert([
            'saying' => 'A real man is one who fears the death of his heart, not of his body.',
            'author' => 'Ibn Qayyim Al-Jawziyya'
        ]);         
    }

}
