<?php

use Illuminate\Database\Seeder;

class TeamEventSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('teams_events')->truncate();
        DB::table('reservations')->insert([
            'id_event' => 1,
            'id_team' => 1
        ]);

        DB::table('teams_events')->insert([
            'id_event' => 2,
            'id_team' => 1
        ]);

        DB::table('teams_events')->insert([
            'id_event' => 3,
            'id_team' => 3
        ]);
    }
}
