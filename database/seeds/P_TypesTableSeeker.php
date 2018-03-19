<?php

use Illuminate\Database\Seeder;

class P_TypesTableSeeker extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('p_types')->insert([
            'name' => "1 Bed Rooms"
        ]);

        DB::table('p_types')->insert([
            'name' => "2 Bed Rooms"
        ]);

        DB::table('p_types')->insert([
            'name' => "3 Bed Rooms"
        ]);
    }

}
