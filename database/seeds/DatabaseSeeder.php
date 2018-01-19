<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(MemberSeeder::class);
        $this->call(TeamSeeder::class);
        $this->call(ProjectSeeder::class);
        $this->call(EventSeeder::class);
        $this->call(ToDoListSeeder::class);
        $this->call(ReservationSeeder::class);
        $this->call(EquipmentSeeder::class);
        $this->call(EquipmentReservationSeeder::class);
        $this->call(ReservationProjectSeeder::class);
        $this->call(TeamEventSeeder::class);
        $this->call(TeamMemberSeeder::class);
    }
}
