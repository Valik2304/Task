<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CountriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::table('countries')->insert([

            ['name' => 'Ukraine'],
            ['name' => 'Poland'],
            ['name' => 'German'],
            ['name' => 'USA'],
            ['name' => 'Canada'],
            ['name' => 'Belgium'],
            ['name' => 'Austria'],
            ['name' => 'Czech Republic'],
            ['name' => 'France'],
            ['name' => 'Japan'],

        ]);

    }
}
