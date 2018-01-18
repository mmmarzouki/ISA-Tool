<?php

use Illuminate\Database\Seeder;

class EventSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('events')->truncate();
        for($i=0;$i<10;$i++) {
            DB::table('events')->insert([
                'reference' => str_random(10),
                'name' => str_random(10),
                'type' => str_random(10)
            ]);
        }
    }
}
