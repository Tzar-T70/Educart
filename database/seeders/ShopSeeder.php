<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ShopSeeder extends Seeder
{
    public function run()
    {
        DB::table('products')->insert([


            [
                'name' => 'Grey Wool Blouson Jacket',
                'slug' => 'grey-wool-blouson-jacket',
                'description' => 'Warm grey wool‑blend blouson jacket with welt pockets, banded hem and clean tailored details.',
                'price' => 30.00,
                'image_url' => 'https://i.pinimg.com/1200x/ca/c8/cf/cac8cf0f1774f51a72258cfafac3dc45.jpg',
                'brand' => 'Wconcept',
                'sub_category_id' => 3,
            ],
            [
                'name' => 'Oversized Grey Jumper',
                'slug' => 'oversized-grey-jumper',
                'description' => 'Soft oversized alpaca‑merino jumper with a textured feel and relaxed fit.',
                'price' => 12.99,
                'image_url' => 'https://i.pinimg.com/474x/8e/09/cf/8e09cfd8ac6d98129b6415cf4a9a0a57.jpg',
                'brand' => 'COS',
                'sub_category_id' => 3,
            ],
            [
                'name' => 'Baggy Blue Washed Jeans',
                'slug' => 'baggy-blue-washed-jeans',
                'description' => 'Relaxed 90s‑inspired baggy balloon jeans made from rigid, authentic‑feel denim that holds its shape.',
                'price' => 15.00,
                'image_url' => 'https://i.pinimg.com/736x/01/d8/47/01d84719d750e9e72c545d65d7b2fac8.jpg',
                'brand' => 'Cotton On',
                'sub_category_id' => 3,
            ],
            [
                'name' => 'M1000 Faux Leather Trainers',
                'slug' => 'm1000-faux-leather-trainers',
                'description' => 'Retro‑inspired M1000 trainers with sleek panelling, breathable mesh and ABZORB cushioning.',
                'price' => 75.00,
                'image_url' => 'https://i.pinimg.com/736x/d3/a6/70/d3a670b44b21cb49bb00103a0ffbed28.jpg',
                'brand' => 'JD Sports',
                'sub_category_id' => 3,
            ],
            [
                'name' => 'Polo Cap',
                'slug' => 'polo-cap',
                'description' => 'Polo Country Logo-Embroidered Cotton-Twill Baseball Cap.',
                'price' => 8.00,
                'image_url' => 'https://i.pinimg.com/736x/fe/dc/5c/fedc5cca9298ec93930541b0275fa320.jpg',
                'brand' => 'Mr Porter',
                'sub_category_id' => 3,
            ],
            [
                'name' => 'Classic T-Shirt',
                'slug' => 'classic-t-shirt',
                'description' => 'Comfortable cotton t-shirt.',
                'price' => 29.99,
                'image_url' => 'https://images.unsplash.com/photo-1521572163474-6864f9cf17ab?ixlib=rb-1.2.1&auto=format&fit=crop&w=1000&q=80',
                'brand' => 'Uniqlo',
                'sub_category_id' => 3,
            ],


            [
                'name' => 'Tailored Marl Midi Dress',
                'slug' => 'tailored-marl-midi-dress',
                'description' => 'A tailored sleeveless midi dress with a defined waist, side‑buckle detailing and practical pockets.',
                'price' => 12.99,
                'image_url' => 'https://i.pinimg.com/1200x/c6/76/cf/c676cfdc60f16d0f72cfeb2971264926.jpg',
                'brand' => 'KM',
                'sub_category_id' => 4,
            ],
            [
                'name' => 'Straight Leg Jeans',
                'slug' => 'straight-leg-jeans',
                'description' => 'Relaxed low‑rise pinstripe jeans with a straight leg and classic five‑pocket design.',
                'price' => 20.00,
                'image_url' => 'https://i.pinimg.com/1200x/d3/73/15/d373159b9c54353f740098a7484947db.jpg',
                'brand' => 'Urban Outfitters',
                'sub_category_id' => 4,
            ],
            [
                'name' => 'Light Pink Poplin Blouse',
                'slug' => 'light-pink-poplin-blouse',
                'description' => 'Light pink poplin blouse with a flared hem, button‑up front and shirred detailing.',
                'price' => 8.00,
                'image_url' => 'https://i.pinimg.com/736x/95/80/e5/9580e5a7d2f6b547a582fb6923998adc.jpg',
                'brand' => 'Motel',
                'sub_category_id' => 4,
            ],
            [
                'name' => 'Double-Breasted Peacoat',
                'slug' => 'double-breasted-peacoat',
                'description' => 'Chic short peacoat with a flattering waist, secure zip pockets and polished detailing.',
                'price' => 32.00,
                'image_url' => 'https://i.pinimg.com/736x/78/22/d2/7822d255ce2f2cbf59c47a0e0947e60e.jpg',
                'brand' => 'Livaa Studio',
                'sub_category_id' => 4,
            ],
            [
                'name' => 'Chocolate Leather Trucker Boots',
                'slug' => 'chocolate-leather-trucker-boots',
                'description' => 'Matte chocolate leather trucker boots with a pull‑on design and mid block heel.',
                'price' => 16.00,
                'image_url' => 'https://i.pinimg.com/736x/8d/ef/e8/8defe85443619cf9c80624e44e14d1a1.jpg',
                'brand' => 'ASOS',
                'sub_category_id' => 4,
            ],
            [
                'name' => 'Classic Structured Purse',
                'slug' => 'classic-structured-purse',
                'description' => 'Spacious, organised purse with a sleek finish and versatile style.',
                'price' => 19.99,
                'image_url' => 'https://i.pinimg.com/1200x/e3/45/99/e34599056445437aa03ecc3a947096cf.jpg',
                'brand' => 'Fenwick',
                'sub_category_id' => 4,
            ],


            [
                'name' => 'Noise-Cancelling Bluetooth Headphones',
                'slug' => 'noise-cancelling-bluetooth-headphones',
                'description' => 'Wireless Bluetooth headphones with noise cancellation, 35-hour battery life and quick charge.',
                'price' => 32.00,
                'image_url' => 'https://i.pinimg.com/736x/e5/4e/df/e54edf3cf8e9d4a0bdd4ef8e1c427dcb.jpg',
                'brand' => 'Sony',
                'sub_category_id' => 9,
            ],
            [
                'name' => 'Samsung Galaxy S23 Ultra 5G',
                'slug' => 'samsung-galaxy-s23-ultra-5g',
                'description' => 'Samsung Galaxy S23 Ultra 5G smartphone.',
                'price' => 350.00,
                'image_url' => 'https://i.pinimg.com/736x/09/53/45/09534564e45b17e86edc75e2e5f8f367.jpg',
                'brand' => 'Samsung',
                'sub_category_id' => 2,
            ],
            [
                'name' => 'Powerbank',
                'slug' => 'powerbank',
                'description' => 'Portable power bank for charging devices on the go.',
                'price' => 11.00,
                'image_url' => 'https://i.pinimg.com/736x/3e/fc/1b/3efc1b4bc35c54fbffe91316ad641e64.jpg',
                'brand' => 'Currys',
                'sub_category_id' => 10,
            ],
            [
                'name' => 'Purple USB Flash Drive',
                'slug' => 'purple-usb-flash-drive',
                'description' => 'Compact purple USB Type-A flash drive with 2GB storage.',
                'price' => 14.00,
                'image_url' => 'https://i.pinimg.com/736x/ed/a7/5e/eda75e5bf9ba138423183eaf166a1432.jpg',
                'brand' => 'Argos',
                'sub_category_id' => 17,
            ],

        ]);
    }
}