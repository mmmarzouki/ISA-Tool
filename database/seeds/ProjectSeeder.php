<?php

use Illuminate\Database\Seeder;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('projects')->truncate();
        for($i=0;$i<3;$i++) {
            DB::table('projects')->insert([
                'name' => str_random(10),
                'description' => str_random(10),
                'type' => str_random(10),
                'id_team' => $i
            ]);
        }
    }
}
