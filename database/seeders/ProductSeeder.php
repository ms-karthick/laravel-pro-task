<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('products')->delete();
        $currentDateTime = now();

        $data = array(
            array(
                'category_id' => 1,
                'product_name' => 'Pizza',
                'qty' => 10,
                'rate' => 299,
                'gst'  => 5,
                'created_at' =>  $currentDateTime,
                'updated_at' => $currentDateTime
            ),
            array(
                'category_id' => 1,
                'product_name' => 'Burger',
                'qty' => 10,
                'rate' => 399,
                'gst'  => 5,
                'created_at' =>  $currentDateTime,
                'updated_at' => $currentDateTime 
            ),
            array(
                'category_id' => 2,
                'product_name' => 'Laptop',
                'qty' => 5,
                'rate' => 54999,
                'gst'  => 18,
                'created_at' =>  $currentDateTime,
                'updated_at' => $currentDateTime 
            ),
            array(
                'category_id' => 3,
                'product_name' => 'T-Shirt',
                'qty' => 50,
                'rate' => 999,
                'gst'  => 12,
                'created_at' =>  $currentDateTime,
                'updated_at' => $currentDateTime 
            ),
            array(
                'category_id' => 2,
                'product_name' => 'Keyboard',
                'qty' => 20,
                'rate' => 999,
                'gst'  => 18,
                'created_at' =>  $currentDateTime,
                'updated_at' => $currentDateTime 
            ),
            array(
                'category_id' => 3,
                'product_name' => 'Sleeveless T-Shirt',
                'qty' => 100,
                'rate' => 999,
                'gst'  => 12,
                'created_at' =>  $currentDateTime,
                'updated_at' => $currentDateTime 
            ),
            );

            DB::table('products')->insert($data);

    }
}
