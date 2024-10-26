<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $csvFile = fopen(base_path("database/data/full_products_data.csv"), "r");


        $firstline = true;

        while (($data = fgetcsv($csvFile, 2000, ",")) !== FALSE) {
            if (!$firstline) {
                Product::create([
                    'brand' => $data[0],
                    'name' => $data[1],
                    'category' => $data[2],
                    'price' => $data[3],
                    'description' => $data[4],
                    'in_store' => $data[5] === 'TRUE',
                ]); 

            }
            $firstline = false;
        }
        fclose($csvFile);
    }
}

