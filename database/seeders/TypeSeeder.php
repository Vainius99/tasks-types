<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;



class TypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table("types")->insert([
            'title' => 'atlikta',
            'description' => 'aprasymas1'
        ]);

        DB::table("types")->insert([
            'title' => 'neatlikta',
            'description' => 'aprasymas2'
        ]);

        DB::table("types")->insert([
            'title' => 'vykdoma',
            'description' => 'aprasymas3'
        ]);

        DB::table("types")->insert([
            'title' => 'nebeaktualu',
            'description' => 'aprasymas4'
        ]);
    }
}
