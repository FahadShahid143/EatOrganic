<?php

use Illuminate\Database\Seeder;

class CustomersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 0; $i < 10; $i++) {
            $customer = array(
                array(
                    'FirstName' => 'Mark',
                    'LastName' => 'Selby',
                    'CustomerEmail'=> 'cust'.$i.'@test.com',
                    'CustomerPhone' => '12345',
                    'CustomerAddress' => 'ABC Town, XYZ City',
                    'City' => 'XYZ'
                )

            );
            DB::table('customers')->insert($customer);
        }
    }
}
