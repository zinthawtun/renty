<?php

use Illuminate\Database\Seeder;

class RolesTableSeeker extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('roles')->insert([
            'name' => "Landlord",
        ]);

        DB::table('roles')->insert([
            'name' => "Tenant"
        ]);
    }
}
