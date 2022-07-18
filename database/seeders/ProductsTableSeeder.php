<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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

        // \App\Models\Product::factory(50)->create();
        $products = [
            ['name' => ' ثلاجة 24 قدم', 'price_bought' => 10000, 'price_sell' => 12000, 'category_id' => 1, 'size_id' => 1, 'quantity' => rand(3, 10)],
            ['name' => 'تليفزيون 24 بوصة', 'price_bought' => 7000, 'price_sell' => 8000, 'category_id' => 1, 'size_id' => 1, 'quantity' => rand(3, 10)],
            ['name' => 'فريزر 6 درج', 'price_bought' => 6000, 'price_sell' => 6800, 'category_id' => 1, 'size_id' => 1, 'quantity' => rand(3, 10)]
        ];
        foreach ($products as $product) {
            Product::create($product);
        }
    }
}
