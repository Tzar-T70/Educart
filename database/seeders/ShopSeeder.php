<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Category;

class ShopSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // --- 1. Technology Category ---
        $tech = Category::updateOrCreate(['slug' => 'technology'], ['name' => 'Technology']);
        $laptops = $tech->subCategories()->updateOrCreate(['slug' => 'laptops'], ['name' => 'Laptops']);
        $phones = $tech->subCategories()->updateOrCreate(['slug' => 'phones'], ['name' => 'Phones']);
        $accessories = $tech->subCategories()->updateOrCreate(['slug' => 'accessories'], ['name' => 'Accessories']);

        // Laptops
        $laptops->products()->updateOrCreate(['slug' => 'macbook-pro'], [
            'name' => 'MacBook Pro',
            'description' => 'Powerful laptop for pros.',
            'price' => 1999.99,
            'image_url' => 'https://images.unsplash.com/photo-1517336714731-489689fd1ca8?ixlib=rb-1.2.1&auto=format&fit=crop&w=1000&q=80',
            'brand' => 'Apple'
        ]);
        $laptops->products()->updateOrCreate(['slug' => 'dell-xps-13'], [
            'name' => 'Dell XPS 13',
            'description' => 'Ultra-slim Windows laptop with InfinityEdge display.',
            'price' => 1299.99,
            'image_url' => 'https://platform.theverge.com/wp-content/uploads/sites/2/chorus/hermano/verge/product/image/10098/236524_Dell_XPS_13_AKrales_0016.jpg?quality=90&strip=all&crop=16.666666666667%2C0%2C66.666666666667%2C100&w=2400',
            'brand' => 'Dell'
        ]);

        // Phones
        $phones->products()->updateOrCreate(['slug' => 'galaxy-s24'], [
            'name' => 'Samsung Galaxy S24',
            'description' => 'Latest Android flagship phone with advanced camera features.',
            'price' => 999.99,
            'image_url' => 'https://encrypted-tbn0.gstatic.com/shopping?q=tbn:ANd9GcSe7F7pvI5cJbdvn4YVEOmQDrinr3R0j03-i5mPovztnPmZu4j5aMl3oyhRhAerre6FOkZoLxT2XyCAWrUSO5qk8vY-CsXSctC70B44mClUzvE84mgvsVsdeJD3CMoqkRRhkrdnArI&usqp=CAc',
            'brand' => 'Samsung'
        ]);
        $phones->products()->updateOrCreate(['slug' => 'google-pixel-8'], [
            'name' => 'Google Pixel 8',
            'description' => 'The best of Google AI in a phone.',
            'price' => 799.00,
            'image_url' => 'https://www.backmarket.co.uk/cdn-cgi/image/format%3Dauto%2Cquality%3D75%2Cwidth%3D640/https://d2e6ccujb3mkqf.cloudfront.net/67fd3ef4-61bb-481c-9c6a-fc68a655fb1d-1_d828ee53-ed39-4f85-954c-45423130844c.jpg',
            'brand' => 'Google'
        ]);

        // Accessories
        $accessories->products()->updateOrCreate(['slug' => 'wireless-earbuds'], [
            'name' => 'Wireless Noise Cancelling Earbuds',
            'description' => 'Premium sound with active noise cancellation.',
            'price' => 249.00,
            'image_url' => 'https://media.currys.biz/i/currysprod/M10280284_black?$l-large$&fmt=auto',
            'brand' => 'Sony'
        ]);
        $accessories->products()->updateOrCreate(['slug' => 'portable-charger'], [
            'name' => '20000mAh Portable Charger',
            'description' => 'High-capacity power bank for multiple charges on the go.',
            'price' => 45.99,
            'image_url' => 'https://images4.joy-sourcing.com/product/s1248x1248_jfsintlpro-000-product/t1/4294967296/5636096/1016145512193000/519630/68b0614eE978bfb85/42b10752b5083d5e.jpg!q70.webp',
            'brand' => 'Anker'
        ]);

        // --- 2. Fashion Category
        $fashion = Category::updateOrCreate(['slug' => 'fashion'], ['name' => 'Fashion']);
        $mens = $fashion->subCategories()->updateOrCreate(['slug' => 'mens'], ['name' => 'Mens']);
        $womens = $fashion->subCategories()->updateOrCreate(['slug' => 'womens'], ['name' => 'Womens']);
        $footwear = $fashion->subCategories()->updateOrCreate(['slug' => 'footwear'], ['name' => 'Footwear']);

        // Mens
        $mens->products()->updateOrCreate(['slug' => 'classic-t-shirt'], [
            'name' => 'Classic T-Shirt',
            'description' => 'Comfortable cotton t-shirt.',
            'price' => 29.99,
            'image_url' => 'https://images.unsplash.com/photo-1521572163474-6864f9cf17ab?ixlib=rb-1.2.1&auto=format&fit=crop&w=1000&q=80',
            'brand' => 'Uniqlo'
        ]);
        $mens->products()->updateOrCreate(['slug' => 'slim-fit-jeans'], [
            'name' => 'Slim Fit Dark Denim Jeans',
            'description' => 'Versatile dark-wash denim.',
            'price' => 79.00,
            'image_url' => 'https://encrypted-tbn3.gstatic.com/shopping?q=tbn:ANd9GcRGAV8BskmSgmg6sMlFXQjGvLqIJ9J1L5xAca2Zc_Ng_9WyjLglYrvBDYKvLUhPyXea2pourWtD12AlNiXjySfbXxT3ownjwiWc_eMJo5_aXGERkWuX5Wqr5w&usqp=CAc',
            'brand' => 'Levis'
        ]);

        // Womens
        $womens->products()->updateOrCreate(['slug' => 'floral-summer-dress'], [
            'name' => 'Floral Summer Dress',
            'description' => 'Light and airy floral print dress.',
            'price' => 65.50,
            'image_url' => 'https://www.crewclothing.co.uk/images/products/large/WWJ062_FOLKMAUVE.jpg',
            'brand' => 'Zara'
        ]);
        $womens->products()->updateOrCreate(['slug' => 'cashmere-sweater'], [
            'name' => 'Soft Cashmere Sweater',
            'description' => 'Luxuriously soft and warm sweater for winter.',
            'price' => 120.00,
            'image_url' => 'https://riseandfall.co/cdn/shop/files/Rise_Fall_CashmereMerinoSaddleSleeveCrewNeckJumperinGraphite_03_d4675dba-69a9-4cb8-99fd-77ce08a61f86.jpg?crop=center&format=webp&height=800&v=1761167623&width=800',
            'brand' => 'Everlane'
        ]);

        // Footwear
        $footwear->products()->updateOrCreate(['slug' => 'running-shoes'], [
            'name' => 'High-Performance Running Shoes',
            'description' => 'Lightweight shoes for long-distance running.',
            'price' => 140.00,
            'image_url' => 'https://encrypted-tbn3.gstatic.com/shopping?q=tbn:ANd9GcSc8VheUvO_jb4mMjiVfTbQY8xzd9qRJm91-CgI0NeqYMdz6GwtbChFXd1l54EbDJIPBVI-yCbMMVBJ7MUfk9t2fVEG1cVqOQ582SAbi1tPZk2sdadG1Bly5KESLO6DoBapuygUhtc&usqp=CAc',
            'brand' => 'Nike'
        ]);
        $footwear->products()->updateOrCreate(['slug' => 'leather-boots'], [
            'name' => 'Classic Leather Ankle Boots',
            'description' => 'Durable and stylish leather boots.',
            'price' => 110.00,
            'image_url' => 'https://cdn.media.amplience.net/i/drmartens/12308001.80.jpg', 
            'brand' => 'Doc Martens'
        ]);

        // --- 3. Dorm Life Category
        $dorm = Category::updateOrCreate(['slug' => 'dorm-life'], ['name' => 'Dorm Life']);
        $bedding = $dorm->subCategories()->updateOrCreate(['slug' => 'bedding'], ['name' => 'Bedding']);
        $decor = $dorm->subCategories()->updateOrCreate(['slug' => 'decor'], ['name' => 'Decor']);
        $storage = $dorm->subCategories()->updateOrCreate(['slug' => 'storage'], ['name' => 'Storage']);

        // Bedding
        $bedding->products()->updateOrCreate(['slug' => 'comfy-duvet'], [
            'name' => 'Comfy Duvet',
            'description' => 'Soft and warm duvet for good sleep.',
            'price' => 89.99,
            'image_url' => 'https://bedable.com/cdn/shop/files/Duvet.jpg?v=1763987683&width=1500',
            'brand' => 'IKEA'
        ]);
        $bedding->products()->updateOrCreate(['slug' => 'extra-long-sheets'], [
            'name' => 'Twin XL Sheet Set',
            'description' => 'Essential extra-long sheets for dorm mattresses.',
            'price' => 39.50,
            'image_url' => 'https://target.scene7.com/is/image/Target/GUEST_24cf91dc-37a8-49fc-a63a-b99121904ecd?wid=300&hei=300&fmt=pjpeg',
            'brand' => 'Threshold'
        ]);

        // Decor
        $decor->products()->updateOrCreate(['slug' => 'string-lights'], [
            'name' => 'LED String Lights',
            'description' => 'Add a cozy ambiance to your room.',
            'price' => 15.99,
            'image_url' => 'https://target.scene7.com/is/image/Target/GUEST_dafcb163-472a-4aec-9a0f-c59dd03b7de8?wid=300&hei=300&fmt=pjpeg',
            'brand' => 'ASDA'
        ]);
        $decor->products()->updateOrCreate(['slug' => 'mini-fridge'], [
            'name' => 'Compact Mini Fridge',
            'description' => 'Perfect for keeping snacks and drinks cold.',
            'price' => 129.99,
            'image_url' => 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTyS3s86ENVh-5u5vCaU_1sA0DjordeR1XeoA&s', 
            'brand' => 'RCA'
        ]);

        // Storage
        $storage->products()->updateOrCreate(['slug' => 'under-bed-storage'], [
            'name' => 'Under-Bed Storage Containers (Set of 2)',
            'description' => 'Maximize space with rolling under-bed storage.',
            'price' => 45.00,
            'image_url' => 'https://m.media-amazon.com/images/I/81xU9sPFPnL._AC_UF894,1000_QL80_.jpg',
            'brand' => 'Rubbermaid'
        ]);
        
        $storage->products()->updateOrCreate(['slug' => 'collapsible-hamper'], [
            'name' => 'Collapsible Laundry Hamper',
            'description' => 'Space-saving hamper for dirty clothes.',
            'price' => 19.99,
            'image_url' => 'https://m.media-amazon.com/images/I/91XBPYyOqfL._AC_UF894,1000_QL80_.jpg', 
            'brand' => 'OXO'
        ]);

        // --- 4. Stationery Category
        $stationery = Category::updateOrCreate(['slug' => 'stationery'], ['name' => 'Stationery']);
        $notebooks = $stationery->subCategories()->updateOrCreate(['slug' => 'notebooks'], ['name' => 'Notebooks']);
        $pens = $stationery->subCategories()->updateOrCreate(['slug' => 'pens'], ['name' => 'Pens']);
        $art_supplies = $stationery->subCategories()->updateOrCreate(['slug' => 'art-supplies'], ['name' => 'Art Supplies']);

        // Notebooks
        $notebooks->products()->updateOrCreate(['slug' => 'premium-notebook'], [
            'name' => 'Premium Notebook',
            'description' => 'High quality paper for your notes.',
            'price' => 12.99,
            'image_url' => 'https://images.unsplash.com/photo-1544816155-12df9643f363?ixlib=rb-1.2.1&auto=format&fit=crop&w=1000&q=80',
            'brand' => 'Moleskine'
        ]);
        $notebooks->products()->updateOrCreate(['slug' => 'spiral-notebook-set'], [
            'name' => '5 Subject Spiral Notebook (3 Pack)',
            'description' => 'Cost-effective notebooks for all your classes.',
            'price' => 15.00,
            'image_url' => 'https://m.media-amazon.com/images/I/61g0PzOqgIL.jpg', 
            'brand' => 'Mead'
        ]);

        // Pens
        $pens->products()->updateOrCreate(['slug' => 'gel-pen-set'], [
            'name' => 'Assorted Gel Pen Set (12 Pack)',
            'description' => 'Smooth writing gel pens in various colors.',
            'price' => 19.50,
            'image_url' => 'https://japanesetaste.co.uk/cdn/shop/files/Pilot-Juice-Gel-Ink-Ballpoint-Pens-0-5mm-12-Color-Set-3-2024-07-23T04_58_41.519Z.jpg?v=1743421032&width=600', 
            'brand' => 'Pilot'
        ]);
        $pens->products()->updateOrCreate(['slug' => 'highlighter-set'], [
            'name' => 'Pastel Highlighter Set',
            'description' => 'Soft colored highlighters for note-taking.',
            'price' => 8.99,
            'image_url' => 'https://cdn.shopify.com/s/files/1/0659/6388/4787/products/SB56646_STABILO-Boss-Pastel-Highlighter-Assorted-Set-of-6_P1.jpg', 
            'brand' => 'Stabilo'
        ]);

        // Art Supplies
        $art_supplies->products()->updateOrCreate(['slug' => 'sketch-pad'], [
            'name' => 'Professional Sketch Pad',
            'description' => 'Heavyweight paper perfect for sketching and drawing.',
            'price' => 9.99,
            'image_url' => 'https://m.media-amazon.com/images/I/71+QK5pJQmL._AC_UF894,1000_QL80_.jpg', 
            'brand' => 'Strathmore'
        ]);
        
        $art_supplies->products()->updateOrCreate(['slug' => 'watercolor-paint-set'], [
            'name' => '24-Color Watercolor Paint Set',
            'description' => 'Portable set of vibrant watercolor paints.',
            'price' => 24.99,
            'image_url' => 'https://uk.winsornewton.com/cdn/shop/files/117600.jpg?v=1760698185',
            'brand' => 'Winsor & Newton'
        ]);
    }
}