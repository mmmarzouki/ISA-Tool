<?php

use Illuminate\Database\Seeder;

class ReservationProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('reservations_projects')->truncate();
        DB::table('reservations')->insert([
            'id_reservation' => 1,
            'id_projects' => 1
        ]);

        DB::table('reservations_projects')->insert([
            'id_reservation' => 1,
            'id_projects' => 2
        ]);

        DB::table('reservations_projects')->insert([
            'id_reservation' => 3,
            'id_projects' => 3
        ]);
    }
}
