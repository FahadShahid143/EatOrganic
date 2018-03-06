<?php

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
        for ($i = 0; $i < 10; $i++) {
            $product = array(
                array(
                    'ProductName' => 'Eggs',
                    'ProductDesc' => 'Desi Eggs',
                    'ProductImage'=> 'public/uploads/image',
                    'CategoryID' => '2',
                    'CompanyID' => '2',
                    'Price' => '120',
                    'Discount' => '5',
                    'Availability' => '1'

                )

            );
            DB::table('products')->insert($product);
        }
    }
}
