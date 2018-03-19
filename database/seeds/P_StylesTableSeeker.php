<?php

use Illuminate\Database\Seeder;

class P_StylesTableSeeker extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('p_styles')->insert([
            'name' => "Flat"
        ]);

        DB::table('p_styles')->insert([
            'name' => "House"
        ]);

        DB::table('p_styles')->insert([
            'name' => "Cottage"
        ]);
        DB::table('p_styles')->insert([
            'name' => "Caravan"
        ]);
    }
}
