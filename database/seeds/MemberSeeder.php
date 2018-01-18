<?php

use Illuminate\Database\Seeder;

class MemberSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('members')->truncate();
        for($i=0;$i<20;$i++) {
            DB::table('members')->insert([
                'name' => str_random(10),
                'lastname' => str_random(10),
                'email' => str_random(10),
                'passwd' => str_random(10),
                'github' => str_random(10),
                'name' => str_random(10),
                'inscriptionDate' => str_random(10),
                'level' => rand(1,5),
                'section' => str_random(10),
                'phone' => $i
            ]);
        }
    }
}
