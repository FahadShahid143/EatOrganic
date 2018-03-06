<?php

use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 0; $i < 10; $i++) {
            $category = array(
                array(
                    'CategoryName' => 'Organic Dairy',
                    'CategoryDesc' => 'It provides fresh dairy products'
                )

            );
            DB::table('categories')->insert($category);
        }
    }
}
