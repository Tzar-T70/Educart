<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;

class ProductSeeder extends Seeder
{
    public function run()
    {
        Product::create([
            'category_id' => 1,
            'name' => 'Laptop',
            'description' => 'Lightweight student laptop',
            'price' => 799.99,
            'stock' => 10,
        ]);

        Product::create([
            'category_id' => 1,
            'name' => 'Wireless Mouse',
            'description' => 'Compact Bluetooth mouse',
            'price' => 19.99,
            'stock' => 50,
        ]);

        Product::create([
            'category_id' => 2,
            'name' => 'Hoodie',
            'description' => 'Comfortable cotton hoodie',
            'price' => 34.99,
            'stock' => 25,
        ]);
    }
}
