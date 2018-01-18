<?php

use Illuminate\Database\Seeder;

class ReservationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('reservations')->truncate();
        for($i=0;$i<3;$i++) {
            DB::table('reservations')->insert([
                'datedebut' => str_random(10),
                'datefin' => str_random(10)
            ]);
        }
    }
}
