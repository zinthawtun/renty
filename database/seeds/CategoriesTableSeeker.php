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
            'name' => "Warning"
        ]);

        DB::table('categories')->insert([
            'name' => "Information"
        ]);

        DB::table('categories')->insert([
            'name' => "Advertisement"
        ]);

        DB::table('categories')->insert([
            'name' => "Announcement"
        ]);

        DB::table('categories')->insert([
            'name' => "Special Offer"
        ]);
    }
}
