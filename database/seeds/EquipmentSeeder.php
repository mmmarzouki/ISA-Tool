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
        \DB::table('equipements')->truncate();
        for($i=0;$i<3;$i++) {
            DB::table('equipements')->insert([
                'reference' => str_random(10),
                'name' => str_random(10),
                'type' => str_random(10)
            ]);
        }
    }
}
