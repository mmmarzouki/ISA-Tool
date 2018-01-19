<?php

use Illuminate\Database\Seeder;

class TeamMemberSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('members_teams')->truncate();
        for($i=0;$i<20;$i++) {
            DB::table('members_teams')->insert([
                'id_member' =>$i,
                'id_team' =>$i
            ]);
            DB::table('members_teams')->insert([
                'id_member' =>$i,
                'id_team' =>($i+1)%20
            ]);
        }
    }
}
