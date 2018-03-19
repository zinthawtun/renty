<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            CategoriesTableSeeker::class,
            N_TypesTableSeeker::class,
            P_StylesTableSeeker::class,
            P_TypesTableSeeker::class,
            RolesTableSeeker::class,
        ]);
    }
}
