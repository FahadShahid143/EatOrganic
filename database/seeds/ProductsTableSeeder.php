<?php

use App\Product;
use Illuminate\Database\Seeder;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        // Vegetables
        Product::create([
            'ProductName' => 'Bell Pepper',
            'ProductDesc' => 'Fresh Vegetables',
            'ProductImage' => 'bellpepper',
            'CompanyID' => '2',
            'Price' => rand(50, 250),
            'Discount' => '0',
            'Availability' => '1', 'Ripeness' => 'riped'
        ])->categories()->attach(1);

        Product::create([
            'ProductName' => 'BitterMelon',
            'ProductDesc' => 'Fresh Vegetables',
            'ProductImage' => 'bittermelon',
            'CompanyID' => '2',
            'Price' => rand(50, 250),
            'Discount' => '0',
            'Availability' => '1', 'Ripeness' => 'riped'
        ])->categories()->attach(1);

        Product::create([
            'ProductName' => 'Brocoli',
            'ProductDesc' => 'Fresh Vegetables',
            'ProductImage' => 'brocoli',
            'CompanyID' => '2',
            'Price' => rand(50, 250),
            'Discount' => '0',
            'Availability' => '1', 'Ripeness' => 'riped'
        ])->categories()->attach(1);

        Product::create([
            'ProductName' => 'Carry',
            'ProductDesc' => 'Fresh Vegetables',
            'ProductImage' => 'carrot',
            'CompanyID' => '2',
            'Price' => rand(50, 250),
            'Discount' => '0',
            'Availability' => '1', 'Ripeness' => 'riped'
        ])->categories()->attach(1);

        Product::create([
            'ProductName' => 'Cuccumber',
            'ProductDesc' => 'Fresh Vegetables',
            'ProductImage' => 'cuccumber',
            'CompanyID' => '2',
            'Price' => rand(50, 250),
            'Discount' => '0',
            'Availability' => '1', 'Ripeness' => 'riped'
        ])->categories()->attach(1);

        Product::create([
            'ProductName' => 'Egg Plant',
            'ProductDesc' => 'Fresh Vegetables',
            'ProductImage' => 'eggplant',
            'CompanyID' => '2',
            'Price' => rand(50, 250),
            'Discount' => '0',
            'Availability' => '1', 'Ripeness' => 'riped'
        ])->categories()->attach(1);

        Product::create([
            'ProductName' => 'Lady Finger',
            'ProductDesc' => 'Fresh Vegetables',
            'ProductImage' => 'ladyfinger',
            'CompanyID' => '2',
            'Price' => rand(50, 250),
            'Discount' => '0',
            'Availability' => '1', 'Ripeness' => 'riped'
        ])->categories()->attach(1);

        Product::create([
            'ProductName' => 'Onion',
            'ProductDesc' => 'Fresh Vegetables',
            'ProductImage'=> 'onion',
            'CompanyID' => '2',
            'Price' => rand(50, 250),
            'Discount' => '0',
            'Availability' => '1', 'Ripeness' => 'riped'
        ])->categories()->attach(1);

        Product::create([
            'ProductName' => 'Peas',
            'ProductDesc' => 'Fresh Vegetables',
            'ProductImage'=> 'peas',
            'CompanyID' => '2',
            'Price' => rand(50, 250),
            'Discount' => '0',
            'Availability' => '1', 'Ripeness' => 'riped'
        ])->categories()->attach(1);

        Product::create([
            'ProductName' => 'Potato',
            'ProductDesc' => 'Fresh Vegetables',
            'ProductImage'=> 'potato',
            'CompanyID' => '2',
            'Price' => rand(50, 250),
            'Discount' => '0',
            'Availability' => '1', 'Ripeness' => 'riped'
        ])->categories()->attach(1);

        Product::create([
            'ProductName' => 'Tomato',
            'ProductDesc' => 'Fresh Vegetables',
            'ProductImage'=> 'tomato',
            'CompanyID' => '2',
            'Price' => rand(50, 250),
            'Discount' => '0',
            'Availability' => '1', 'Ripeness' => 'riped'
        ])->categories()->attach(1);

// Make Vegetable 1 a Fruit as well. Just to test multiple categories
        $product = Product::find(1);
        $product->categories()->attach(2);



        // Fruies
        Product::create([
            'ProductName' => 'Apple',
            'ProductDesc' => 'Fresh Fruit',
            'ProductImage' => 'apple',
            'CompanyID' => '2',
            'Price' => rand(50, 250),
            'Discount' => '0',
            'Availability' => '1', 'Ripeness' => 'riped'
        ])->categories()->attach(2);

        Product::create([
            'ProductName' => 'Avacoda',
            'ProductDesc' => 'Fresh Fruit',
            'ProductImage' => 'avacoda',
            'CompanyID' => '2',
            'Price' => rand(50, 250),
            'Discount' => '0',
            'Availability' => '1', 'Ripeness' => 'riped'
        ])->categories()->attach(2);

        Product::create([
            'ProductName' => 'Banana',
            'ProductDesc' => 'Fresh Fruit',
            'ProductImage' => 'banana',
            'CompanyID' => '2',
            'Price' => rand(50, 250),
            'Discount' => '0',
            'Availability' => '1', 'Ripeness' => 'riped'
        ])->categories()->attach(2);

        Product::create([
            'ProductName' => 'Cherry',
            'ProductDesc' => 'Fresh Fruit',
            'ProductImage' => 'cherry',
            'CompanyID' => '2',
            'Price' => rand(50, 250),
            'Discount' => '0',
            'Availability' => '1', 'Ripeness' => 'riped'
        ])->categories()->attach(2);

        Product::create([
            'ProductName' => 'Grape',
            'ProductDesc' => 'Fresh Fruit',
            'ProductImage' => 'grape',
            'CompanyID' => '2',
            'Price' => rand(50, 250),
            'Discount' => '0',
            'Availability' => '1', 'Ripeness' => 'riped'
        ])->categories()->attach(2);

        Product::create([
            'ProductName' => 'Guava',
            'ProductDesc' => 'Fresh Fruit',
            'ProductImage' => 'guava',
            'CompanyID' => '2',
            'Price' => rand(50, 250),
            'Discount' => '0',
            'Availability' => '1', 'Ripeness' => 'riped'
        ])->categories()->attach(2);
        Product::create([
            'ProductName' => 'Kiwi',
            'ProductDesc' => 'Fresh Fruit',
            'ProductImage' => 'kiwi',
            'CompanyID' => '2',
            'Price' => rand(50, 250),
            'Discount' => '0',
            'Availability' => '1', 'Ripeness' => 'riped'
        ])->categories()->attach(2);

        Product::create([
            'ProductName' => 'Orange',
            'ProductDesc' => 'Fresh Fruit',
            'ProductImage'=> 'orange',
            'CompanyID' => '2',
            'Price' => rand(50, 250),
            'Discount' => '0',
            'Availability' => '1', 'Ripeness' => 'riped'
        ])->categories()->attach(2);
        Product::create([
            'ProductName' => 'Pomegranate',
            'ProductDesc' => 'Fresh Fruit',
            'ProductImage'=> 'pomegranata',
            'CompanyID' => '2',
            'Price' => rand(50, 250),
            'Discount' => '0',
            'Availability' => '1', 'Ripeness' => 'riped'
        ])->categories()->attach(2);
        Product::create([
            'ProductName' => 'Strawberry',
            'ProductDesc' => 'Fresh Fruit',
            'ProductImage'=> 'strawberry',
            'CompanyID' => '2',
            'Price' => rand(50, 250),
            'Discount' => '0',
            'Availability' => '1', 'Ripeness' => 'riped'
        ])->categories()->attach(2);
        Product::create([
            'ProductName' => 'Watermelon',
            'ProductDesc' => 'Fresh Fruit',
            'ProductImage'=> 'watermelon',
            'CompanyID' => '2',
            'Price' => rand(50, 250),
            'Discount' => '0',
            'Availability' => '1', 'Ripeness' => 'riped'
        ])->categories()->attach(2);
    }
}
