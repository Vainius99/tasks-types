<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use illuminate\Support\Facades\DB;


class TaskSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        for ($i=0; $i<10; $i++) {
            $darbas = "darbas".($i+1);
            $aprasymas = "aprasymas".($i+1);
            $logo = "logo".($i+1);


            DB::table('tasks')->insert([
                'title' => $darbas,
                'description' => $aprasymas,
                'type_id' => rand(1, 4),
                'start_date' => date('y-m-d'),
                'end_date' => date('y-m-d'),
                'logo' => $logo,

            ]);
        }

    }
}
