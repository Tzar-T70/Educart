<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;
use App\Models\SubCategory;
use App\Models\Product;


class DatabaseSeeder extends Seeder
{
    public function run()
    {
        $this->call(ShopSeeder::class);
    }
}