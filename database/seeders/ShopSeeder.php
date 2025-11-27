<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ShopSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tech = \App\Models\Category::updateOrCreate(['slug' => 'technology'], ['name' => 'Technology']);
        $laptops = $tech->subCategories()->updateOrCreate(['slug' => 'laptops'], ['name' => 'Laptops']);
        $phones = $tech->subCategories()->updateOrCreate(['slug' => 'phones'], ['name' => 'Phones']);

        $laptops->products()->updateOrCreate(['slug' => 'macbook-pro'], [
            'name' => 'MacBook Pro',
            'description' => 'Powerful laptop for pros.',
            'price' => 1999.99,
            'image_url' => 'https://images.unsplash.com/photo-1517336714731-489689fd1ca8?ixlib=rb-1.2.1&auto=format&fit=crop&w=1000&q=80',
            'brand' => 'Apple'
        ]);

        $fashion = \App\Models\Category::updateOrCreate(['slug' => 'fashion'], ['name' => 'Fashion']);
        $mens = $fashion->subCategories()->updateOrCreate(['slug' => 'mens'], ['name' => 'Mens']);
        $womens = $fashion->subCategories()->updateOrCreate(['slug' => 'womens'], ['name' => 'Womens']);
        
        $mens->products()->updateOrCreate(['slug' => 'classic-t-shirt'], [
            'name' => 'Classic T-Shirt',
            'description' => 'Comfortable cotton t-shirt.',
            'price' => 29.99,
            'image_url' => 'https://images.unsplash.com/photo-1521572163474-6864f9cf17ab?ixlib=rb-1.2.1&auto=format&fit=crop&w=1000&q=80',
            'brand' => 'Uniqlo'
        ]);

        $dorm = \App\Models\Category::updateOrCreate(['slug' => 'dorm-life'], ['name' => 'Dorm Life']);
        $bedding = $dorm->subCategories()->updateOrCreate(['slug' => 'bedding'], ['name' => 'Bedding']);
        $decor = $dorm->subCategories()->updateOrCreate(['slug' => 'decor'], ['name' => 'Decor']);

        $bedding->products()->updateOrCreate(['slug' => 'comfy-duvet'], [
            'name' => 'Comfy Duvet',
            'description' => 'Soft and warm duvet for good sleep.',
            'price' => 89.99,
            'image_url' => 'https://bedable.com/cdn/shop/files/Duvet.jpg?v=1763987683&width=1500',
            'brand' => 'IKEA'
        ]);

        $stationery = \App\Models\Category::updateOrCreate(['slug' => 'stationery'], ['name' => 'Stationery']);
        $notebooks = $stationery->subCategories()->updateOrCreate(['slug' => 'notebooks'], ['name' => 'Notebooks']);
        $pens = $stationery->subCategories()->updateOrCreate(['slug' => 'pens'], ['name' => 'Pens']);

        $notebooks->products()->updateOrCreate(['slug' => 'premium-notebook'], [
            'name' => 'Premium Notebook',
            'description' => 'High quality paper for your notes.',
            'price' => 12.99,
            'image_url' => 'https://images.unsplash.com/photo-1544816155-12df9643f363?ixlib=rb-1.2.1&auto=format&fit=crop&w=1000&q=80',
            'brand' => 'Moleskine'
        ]);
    }
}
