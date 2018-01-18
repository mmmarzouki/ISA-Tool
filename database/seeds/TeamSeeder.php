<?php

use Illuminate\Database\Seeder;

class TeamSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('teams')->truncate();
        for($i=0;$i<5;$i++) {
            DB::table('teams')->insert([
                'name' => str_random(10),
                'id_manager' =>$i,
                'role' => str_random(10)
            ]);
        }
    }
}
