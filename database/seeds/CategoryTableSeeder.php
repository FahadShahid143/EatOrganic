<?php

use App\Category;
use Illuminate\Database\Seeder;

class CategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        Category::create([
            'CategoryName' => 'Vegetables',
            'CategoryDesc' => 'It provides fresh dairy products'
        ]);


        Category::create([
            'CategoryName' => 'Fruits',
            'CategoryDesc' => 'It provides fresh dairy products'
        ]);

        Category::create([
            'CategoryName' => 'Meats',
            'CategoryDesc' => 'It provides fresh dairy products'
        ]);

        Category::create([
            'CategoryName' => 'Fried Foods',
            'CategoryDesc' => 'It provides fresh dairy products'
        ]);

        Category::create([
            'CategoryName' => 'Juices',
            'CategoryDesc' => 'It provides fresh dairy products'
        ]);

        Category::create([
            'CategoryName' => 'Gym Foods',
            'CategoryDesc' => 'It provides fresh dairy products'
        ]);

        Category::create([
            'CategoryName' => 'Fish',
            'CategoryDesc' => 'It provides fresh dairy products'
        ]);

        /*for ($i = 0; $i < 10; $i++) {
            $category = array(
                array(
                    'CategoryName' => 'Organic Dairy',
                    'CategoryDesc' => 'It provides fresh dairy products'
                )

            );
            DB::table('categories')->insert($category);
        }*/
    }
}
