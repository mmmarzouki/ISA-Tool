<?php

use Illuminate\Database\Seeder;

class ToDoListSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('todo_lists')->truncate();
        for($i=0;$i<3;$i++) {
            DB::table('todo_lists')->insert([
                'description' => str_random(10),
                'status' => str_random(10),
                'id_project' =>$i,
                'deadLine' => str_random(10)
            ]);
        }
    }
}
