<?php

use Illuminate\Database\Seeder;

class CompaniesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 0; $i < 10; $i++) {
            $company = array(
                array(
                    'CompanyName' => 'MyCompany',
                    'CompanyAddress' => 'ABC Town, XYZ City',
                    'City' => 'XYZ',
                    'CompanyEmail' => 'admin@test.com',
                    'CompanyPhone' => '12345'
                )

            );
            DB::table('companies')->insert($company);
        }
    }
}
