<?php

use Illuminate\Database\Seeder;

class N_TypesTableSeeker extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('n_types')->insert([
            'name' => "Urgent Response"
        ]);

        DB::table('n_types')->insert([
            'name' => "Basic"
        ]);
    }
}
