<?php

use Illuminate\Database\Seeder;

class PlayerTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('players')->truncate();
        DB::table('players')->insert(array('first_name' => 'Albert','last_name'=>'Guðmundsson','team_id'=>'1','image_path'=>''));
        DB::table('players')->insert(array('first_name' => 'Luuk','last_name'=>' de Jong','team_id'=>'1','image_path'=>''));
        DB::table('players')->insert(array('first_name' => 'David','last_name'=>'Neres','team_id'=>'2','image_path'=>''));
        DB::table('players')->insert(array('first_name' => 'Václav','last_name'=>'Černý','team_id'=>'2','image_path'=>''));
    }
}
