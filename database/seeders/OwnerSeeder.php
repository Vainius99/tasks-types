<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
// use illuminate\Support\Facades\DB;
use DB;


class OwnerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i=0; $i<20; $i++) {
            $vardas = "vardas".($i+1);
            $pavarde = "pavarde".($i+1);
            $email = $vardas."@email.com";

            DB::table('owners')->insert([
                'name' => $vardas,
                'surname' => $pavarde,
                'email' => $email,
                'phone' => rand(100000000, 999999999),

            ]);
        }
    }
}
