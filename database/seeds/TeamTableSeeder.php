<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;

class TeamTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0');
        DB::table('teams')->truncate();
        DB::table('teams')->insert(array('name' => 'PSV','image_path'=>''));
        DB::table('teams')->insert(array('name' => 'Ajax','image_path'=>''));
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }
}
