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
        DB::table('players')->insert(array('first_name' => 'Benjamin','last_name'=>' van Leer','team_id'=>'2','image_path'=>'avatars\players\benjamin.png'));
        DB::table('players')->insert(array('first_name' => 'Joël','last_name'=>'Veltman','team_id'=>'2','image_path'=>'avatars\players\joel.png'));
        DB::table('players')->insert(array('first_name' => 'Daley ','last_name'=>'Sinkgraven','team_id'=>'2','image_path'=>'avatars\players\daley.png'));
        DB::table('players')->insert(array('first_name' => 'Jeroen','last_name'=>'Zoet','team_id'=>'1','image_path'=>'avatars\players\jeroen.png'));
        DB::table('players')->insert(array('first_name' => 'Derrick','last_name'=>'Luckassen','team_id'=>'1','image_path'=>'avatars\players\derek.png'));
        DB::table('players')->insert(array('first_name' => 'Maximiliano','last_name'=>'Romero','team_id'=>'1','image_path'=>'avatars\players\maxi.png'));
        DB::table('players')->insert(array('first_name' => 'Kenneth','last_name'=>'Vermeer','team_id'=>'3','image_path'=>'avatars\players\ver.png'));
        DB::table('players')->insert(array('first_name' => 'Karim','last_name'=>'El Ahmadi','team_id'=>'3','image_path'=>'avatars\players\karim.png'));
        DB::table('players')->insert(array('first_name' => 'David','last_name'=>'Jensen','team_id'=>'4','image_path'=>'avatars\players\david.png'));
        DB::table('players')->insert(array('first_name' => 'Ramon','last_name'=>'Leeuwin','team_id'=>'4','image_path'=>'avatars\players\ramon.png'));



    }
}
