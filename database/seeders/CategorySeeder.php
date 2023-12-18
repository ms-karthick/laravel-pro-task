<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('categories')->delete();
        $currentDateTime = now();

        $data = array(
            array(
                'category_name' => 'Food',
                'created_at' =>  $currentDateTime,
                'updated_at' => $currentDateTime
            ),
            array(
                'category_name' => 'Electronics',
                'created_at' =>  $currentDateTime,
                'updated_at' => $currentDateTime 
            ),
            array(
                'category_name' => 'Apparel',
                'created_at' =>  $currentDateTime,
                'updated_at' => $currentDateTime 
            ),
            );

            DB::table('categories')->insert($data);

    }
}
