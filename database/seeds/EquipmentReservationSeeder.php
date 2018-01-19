<?php

use Illuminate\Database\Seeder;

class EquipmentReservationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('equipements_reservations')->truncate();
        DB::table('equipements_reservations')->insert([
            'id_reservation' => 1,
            'id_equipments' => 1
        ]);

        DB::table('equipements_reservations')->insert([
        'id_reservation' => 1,
        'id_equipments' => 2
        ]);

        DB::table('equipements_reservations')->insert([
            'id_reservation' => 3,
            'id_equipments' => 3
        ]);
    }
}
