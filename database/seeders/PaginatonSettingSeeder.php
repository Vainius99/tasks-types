<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use illuminate\Support\Facades\DB;

class PaginatonSettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('paginaton_settings')->insert([
            'title' => '30',
            'value' => '30',
            'visible'=> '1',
        ]);

        DB::table('paginaton_settings')->insert([
            'title' => '15',
            'value' => '15',
            'visible'=> '1',
        ]);

        DB::table('paginaton_settings')->insert([
            'title' => '5',
            'value' => '5',
            'visible'=> '1',
        ]);

        DB::table('paginaton_settings')->insert([
            'title' => 'All',
            'value' => '1',
            'visible'=> '1',
        ]);
    }
}
