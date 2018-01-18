<?php

use Illuminate\Database\Seeder;

class EquipmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('equipments')->truncate();
        for($i=0;$i<3;$i++) {
            DB::table('equipments')->insert([
                'date' => str_random(10),
                'name' => str_random(10)
            ]);
        }
    }
}
