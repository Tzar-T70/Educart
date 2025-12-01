<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    public function run()
    {
        Category::create(['category_name' => 'Technology']);
        Category::create(['category_name' => 'Fashion']);
        Category::create(['category_name' => 'Home & Kitchen']);
        Category::create(['category_name' => 'Accessories']);
    }
}
