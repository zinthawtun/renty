<?php

use Illuminate\Database\Seeder;

class CategoriesTableSeeker extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert([
            'name' => "Warning",
            'type' => "warning"
        ]);

        DB::table('categories')->insert([
            'name' => "Information",
            'type' => "info"
        ]);

        DB::table('categories')->insert([
            'name' => "Advertisement",
            'type' => "dark"
        ]);

        DB::table('categories')->insert([
            'name' => "Announcement",
            'type' => "success"
        ]);

        DB::table('categories')->insert([
            'name' => "Special Offer",
            'type' => "primary"
        ]);
    }
}
