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
        // --- 1. Technology Category
        $tech = Category::updateOrCreate(['slug' => 'technology'], ['name' => 'Technology']);
        $laptops = $tech->subCategories()->updateOrCreate(['slug' => 'laptops'], ['name' => 'Laptops']);
        $phones = $tech->subCategories()->updateOrCreate(['slug' => 'phones'], ['name' => 'Phones']);
        $accessories = $tech->subCategories()->updateOrCreate(['slug' => 'accessories'], ['name' => 'Accessories']);

        // Laptops
        $laptops->products()->updateOrCreate(['slug' => 'macbook-pro'], [
            'name' => 'MacBook Pro',
            'description' => 'Powerful laptop for pros.',
            'price' => 799.99,
            'image_url' => 'https://images.unsplash.com/photo-1517336714731-489689fd1ca8?ixlib=rb-1.2.1&auto=format&fit=crop&w=1000&q=80',
            'brand' => 'Apple'
        ]);
        $laptops->products()->updateOrCreate(['slug' => 'dell-xps-13'], [
            'name' => 'Dell XPS 13',
            'description' => 'Ultra-slim Windows laptop with InfinityEdge display.',
            'price' => 499.99,
            'image_url' => 'https://platform.theverge.com/wp-content/uploads/sites/2/chorus/hermano/verge/product/image/10098/236524_Dell_XPS_13_AKrales_0016.jpg?quality=90&strip=all&crop=16.666666666667%2C0%2C66.666666666667%2C100&w=2400',
            'brand' => 'Dell'
        ]);
        $laptops->products()->updateOrCreate(['slug' => 'hp-amd-15-laptop'], [
              'name' => 'HP AMD 15" Full HD Laptop',
               'description' => 'Reliable HP laptop with AMD Ryzen processor, 15-inch Full HD display, and smooth performance for everyday tasks, work, and study.',
               'price' => 539.99,
              'image_url' => 'https://i.pinimg.com/736x/68/b6/8d/68b68d6ed55958ec967ef07ef6717aed.jpg',
               'brand' => 'HP'
        ]);
        $laptops->products()->updateOrCreate(['slug' => 'sleek-macbook-style-laptop'], [
          'name' => 'Sleek MacBook Style Laptop',
             'description' => 'Ultra-slim laptop with a high-resolution display, smooth performance, and a minimalist design perfect for productivity and creative work.',
            'price' => 600.00,
            'image_url' => 'https://images.unsplash.com/photo-1541807084-5c52b6b3adef?q=80&w=687&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D',
            'brand' => 'Apple'
        ]);
        $laptops->products()->updateOrCreate(['slug' => 'silver-macbook-style-laptop'], [
      'name' => 'Silver MacBook Style Laptop',
      'description' => 'Sleek silver laptop with a minimalist design, smooth performance, and lightweight build for everyday productivity.',
      'price' => 649.99,
      'image_url' => 'https://images.unsplash.com/photo-1611186871348-b1ce696e52c9?q=80&w=1170&auto=format&fit=crop',
      'brand' => 'Apple'
       ]);

      $laptops->products()->updateOrCreate(['slug' => 'creative-display-laptop'], [
      'name' => 'Creative Display Laptop',
      'description' => 'High-resolution laptop with vibrant display, perfect for creative work, editing, and multitasking.',
      'price' => 350.00,
       'image_url' => 'https://images.unsplash.com/photo-1511385348-a52b4a160dc2?q=80&w=1207&auto=format&fit=crop',
      'brand' => 'Apple'
     ]);

    $laptops->products()->updateOrCreate(['slug' => 'ultra-thin-purple-display-laptop'], [
      'name' => 'Ultra Thin Purple Display Laptop',
      'description' => 'Ultra-slim laptop with a stunning purple display, designed for speed, portability, and modern performance.',
      'price' => 699.99,
      'image_url' => 'https://images.unsplash.com/photo-1542393545-10f5cde2c810?q=80&w=1965&auto=format&fit=crop',
      'brand' => 'Apple'
    ]);

     $laptops->products()->updateOrCreate(['slug' => 'macbook-pro-retina-display'], [
      'name' => 'MacBook Pro Retina Display',
      'description' => 'Powerful MacBook with Retina display, fast processing, and premium build quality for professionals.',
      'price' => 900.00,
      'image_url' => 'https://images.unsplash.com/photo-1580522154071-c6ca47a859ad?q=80&w=1170&auto=format&fit=crop',
      'brand' => 'Apple'
    ]);

        // Phones
        $phones->products()->updateOrCreate(['slug' => 'galaxy-s24'], [
            'name' => 'Samsung Galaxy S24',
            'description' => 'Latest Android flagship phone with advanced camera features.',
            'price' => 700.00,
            'image_url' => 'https://encrypted-tbn0.gstatic.com/shopping?q=tbn:ANd9GcSe7F7pvI5cJbdvn4YVEOmQDrinr3R0j03-i5mPovztnPmZu4j5aMl3oyhRhAerre6FOkZoLxT2XyCAWrUSO5qk8vY-CsXSctC70B44mClUzvE84mgvsVsdeJD3CMoqkRRhkrdnArI&usqp=CAc',
            'brand' => 'Samsung'
        ]);
        $phones->products()->updateOrCreate(['slug' => 'google-pixel-8'], [
            'name' => 'Google Pixel 8',
            'description' => 'The best of Google AI in a phone.',
            'price' => 450.00,
            'image_url' => 'https://www.backmarket.co.uk/cdn-cgi/image/format%3Dauto%2Cquality%3D75%2Cwidth%3D640/https://d2e6ccujb3mkqf.cloudfront.net/67fd3ef4-61bb-481c-9c6a-fc68a655fb1d-1_d828ee53-ed39-4f85-954c-45423130844c.jpg',
            'brand' => 'Google'
        ]);
        $phones->products()->updateOrCreate(['slug' => 'samsung-galaxy-s23-ultra-5g'], [
         'name' => 'Samsung Galaxy S23 Ultra 5G',
         'description' => 'Samsung Galaxy S23 Ultra 5G smartphone.',
         'price' => 350.00,
         'image_url' => 'https://i.pinimg.com/736x/09/53/45/09534564e45b17e86edc75e2e5f8f367.jpg',
           'brand' => 'Samsung'
       ]);
       $phones->products()->updateOrCreate(['slug' => 'iphone-16e'], [
         'name' => 'iPhone 16e',
         'description' => 'Next generation iPhone with a sleek design, advanced camera system, and powerful performance for everyday use.',
         'price' => 649.99,
         'image_url' => 'https://b2c-contenthub.com/wp-content/uploads/2025/02/iPhone-16e-main-image.png',
          'brand' => 'Apple'
            
          ]);
        $phones->products()->updateOrCreate(['slug' => 'iphone-16-plus-blue'], [
       'name' => 'iPhone 16 Plus (Ultramarine)',
       'description' => 'Stylish ultramarine iPhone with a large display, powerful performance, and advanced camera system.',
       'price' => 750.99,
       'image_url' => 'https://freemans.scene7.com/is/image/OttoUK/553w/apple-iphone-16-plus-128gb-ultramarine~61D221FRSP.jpg',
       'brand' => 'Apple'
         ]);

        $phones->products()->updateOrCreate(['slug' => 'samsung-a26-white'], [
        'name' => 'Samsung Galaxy A26 5G',
        'description' => 'Affordable 5G smartphone with smooth performance, large display, and long battery life.',
        'price' => 250.00,
        'image_url' => 'https://freemans.scene7.com/is/image/OttoUK/553w/samsung-galaxy-a26-5g-256gb-sim-free-mobile-phone---white~43X864FRSP.jpg',
        'brand' => 'Samsung'
         ]);

       $phones->products()->updateOrCreate(['slug' => 'iphone-17e-black'], [
        'name' => 'iPhone 17e (Black)',
        'description' => 'Next-generation iPhone with sleek black finish, enhanced performance, and improved camera technology.',
         'price' => 800.00,
        'image_url' => 'https://freemans.scene7.com/is/image/OttoUK/553w/apple-iphone-17e-512gb---black~91S196FRSP.jpg',
        'brand' => 'Apple'
        ]);

       $phones->products()->updateOrCreate(['slug' => 'iphone-17-pro-max-orange'], [
       'name' => 'iPhone 17 Pro Max (Cosmic Orange)',
        'description' => 'Premium flagship iPhone with a bold cosmic orange finish, top-tier performance, and pro-level camera system.',
        'price' => 850.00,
        'image_url' => 'https://freemans.scene7.com/is/image/OttoUK/553w/apple-iphone-17-pro-max-256gb---cosmic-orange~76X004FRSC.jpg',
        'brand' => 'Apple'
       ]);
        // Accessories
        $accessories->products()->updateOrCreate(['slug' => 'wireless-earbuds'], [
            'name' => 'Wireless Noise Cancelling Earbuds',
            'description' => 'Premium sound with active noise cancellation.',
            'price' => 60.00,
            'image_url' => 'https://media.currys.biz/i/currysprod/M10280284_black?$l-large$&fmt=auto',
            'brand' => 'Sony'
        ]);
        $accessories->products()->updateOrCreate(['slug' => 'portable-charger'], [
            'name' => '20000mAh Portable Charger',
            'description' => 'High-capacity power bank for multiple charges on the go.',
            'price' => 18.99,
            'image_url' => 'https://images4.joy-sourcing.com/product/s1248x1248_jfsintlpro-000-product/t1/4294967296/5636096/1016145512193000/519630/68b0614eE978bfb85/42b10752b5083d5e.jpg!q70.webp',
            'brand' => 'Anker'
        ]);
        $accessories->products()->updateOrCreate(['slug' => 'noise-cancelling-bluetooth-headphones'], [
        'name' => 'Noise-Cancelling Bluetooth Headphones',
        'description' => 'Wireless Bluetooth headphones with noise cancellation, 35-hour battery life and quick charge.',
        'price' => 40.00,
        'image_url' => 'https://i.pinimg.com/736x/e5/4e/df/e54edf3cf8e9d4a0bdd4ef8e1c427dcb.jpg',
        'brand' => 'Sony'
       ]);

         $accessories->products()->updateOrCreate(['slug' => 'powerbank'], [
           'name' => 'Powerbank',
            'description' => 'Portable power bank for charging devices on the go.',
            'price' => 11.00,
             'image_url' => 'https://i.pinimg.com/736x/3e/fc/1b/3efc1b4bc35c54fbffe91316ad641e64.jpg',
            'brand' => 'Currys'
        ]);

        $accessories->products()->updateOrCreate(['slug' => 'purple-usb-flash-drive'], [
            'name' => 'Purple USB Flash Drive',
             'description' => 'Compact purple USB Type-A flash drive with 2GB storage.',
             'price' => 14.00,
             'image_url' => 'https://i.pinimg.com/736x/ed/a7/5e/eda75e5bf9ba138423183eaf166a1432.jpg',
             'brand' => 'cruzer'
       ]);
         $accessories->products()->updateOrCreate(['slug' => 'reflex-active-smart-watch'], [
         'name' => 'Reflex Active Smart Watch',
         'description' => 'Modern smart watch with fitness tracking, heart rate monitoring, and sleek black strap design.',
         'price' => 49.99,
         'image_url' => 'https://freemans.scene7.com/is/image/OttoUK/553w/reflex-active-series-13-black-strap-smart-watch~83T512FRSP.jpg',
         'brand' => 'Reflex Active'
         ]);

        $accessories->products()->updateOrCreate(['slug' => 'apple-airtag'], [
        'name' => 'Apple AirTag',
         'description' => 'Keep track of your belongings with Apple AirTag using precision tracking and Find My network.',
         'price' => 29.99,
         'image_url' => 'https://freemans.scene7.com/is/image/OttoUK/553w/apple-airtag-(1-pack)~46H165FRSP.jpg',
        'brand' => 'Apple'
        ]);
 
        $accessories->products()->updateOrCreate(['slug' => 'jbl-flip-7-speaker'], [
         'name' => 'JBL Flip 7 Bluetooth Speaker',
        'description' => 'Portable waterproof speaker with powerful sound and long battery life, perfect for music on the go.',
        'price' => 89.99,
        'image_url' => 'https://freemans.scene7.com/is/image/OttoUK/553w/jbl-flip-7-speaker---blue~29B849FRSP.jpg',
        'brand' => 'JBL'
        ]);

        // --- 2. Fashion Category
        $fashion = Category::updateOrCreate(['slug' => 'fashion'], ['name' => 'Fashion']);
        $mens = $fashion->subCategories()->updateOrCreate(['slug' => 'mens'], ['name' => 'Mens']);
        $womens = $fashion->subCategories()->updateOrCreate(['slug' => 'womens'], ['name' => 'Womens']);
        $footwear = $fashion->subCategories()->updateOrCreate(['slug' => 'footwear'], ['name' => 'Footwear']);

        // Mens
        $mens->products()->updateOrCreate(['slug' => 'white-t-shirt'], [
            'name' => 'White T-Shirt',
            'description' => 'Comfortable cotton t-shirt.',
            'price' => 11.99,
            'image_url' => 'https://images.unsplash.com/photo-1521572163474-6864f9cf17ab?ixlib=rb-1.2.1&auto=format&fit=crop&w=1000&q=80',
            'brand' => 'Uniqlo'
        ]);
        $mens->products()->updateOrCreate(['slug' => 'slim-fit-jeans'], [
            'name' => 'Slim Fit Dark Denim Jeans',
            'description' => 'Versatile dark wash denim.',
            'price' => 15.00,
            'image_url' => 'https://encrypted-tbn3.gstatic.com/shopping?q=tbn:ANd9GcRGAV8BskmSgmg6sMlFXQjGvLqIJ9J1L5xAca2Zc_Ng_9WyjLglYrvBDYKvLUhPyXea2pourWtD12AlNiXjySfbXxT3ownjwiWc_eMJo5_aXGERkWuX5Wqr5w&usqp=CAc',
            'brand' => 'Levis'
        ]);
        $mens->products()->updateOrCreate(['slug' => 'grey-wool-blouson-jacket'], [
              'name' => 'Grey Wool Blouson Jacket',
              'description' => 'Warm grey wool-blend blouson jacket with welt pockets, banded hem and clean tailored details.',
             'price' => 30.00,
             'image_url' => 'https://i.pinimg.com/1200x/ca/c8/cf/cac8cf0f1774f51a72258cfafac3dc45.jpg',
             'brand' => 'Wconcept'
       ]);
       $mens->products()->updateOrCreate(['slug' => 'oversized-grey-jumper'], [
             'name' => 'Oversized Grey Jumper',
             'description' => 'Soft oversized alpaca-merino jumper with a textured feel and relaxed fit.',
             'price' => 12.99,
             'image_url' => 'https://i.pinimg.com/474x/8e/09/cf/8e09cfd8ac6d98129b6415cf4a9a0a57.jpg',
             'brand' => 'COS'
       ]);
        $mens->products()->updateOrCreate(['slug' => 'polo-cap'], [
            'name' => 'Polo Cap',
         'description' => 'Polo Country Logo-Embroidered Cotton-Twill Baseball Cap.',
         'price' => 5.00,
         'image_url' => 'https://i.pinimg.com/736x/fe/dc/5c/fedc5cca9298ec93930541b0275fa320.jpg',
          'brand' => 'Mr Porter'
       ]);
       $mens->products()->updateOrCreate(['slug' => 'yellow-casual-overshirt'], [
         'name' => 'Yellow Casual Overshirt',
         'description' => 'Lightweight yellow overshirt layered over a striped t-shirt, perfect for a relaxed summer look.',
         'price' => 10.00,
        'image_url' => 'https://plus.unsplash.com/premium_photo-1683140435505-afb6f1738d11?q=80&w=687&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D',
         'brand' => 'Zara'
       ]);
      $mens->products()->updateOrCreate(['slug' => 'grey-relaxed-jeans'], [
      'name' => 'Grey Relaxed Fit Jeans',
      'description' => 'Light grey jeans with a relaxed fit, offering comfort and a clean modern style.',
      'price' => 16.99,
      'image_url' => 'https://i.pinimg.com/736x/85/50/bb/8550bbd8c5266799114356858b086ee1.jpg',
       'brand' => 'Pull & Bear'
       ]);
      $mens->products()->updateOrCreate(['slug' => 'black-tshirt'], [
      'name' => 'Black T-Shirt',
      'description' => 'Simple black t-shirt with a clean fit, made from soft breathable cotton for everyday wear.',
      'price' => 9.99,
      'image_url' => 'https://plus.unsplash.com/premium_photo-1689531916407-d64dedd6126d?q=80&w=813&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D',
      'brand' => 'Uniqlo'
      ]);
     $mens->products()->updateOrCreate(['slug' => 'black-washed-jeans'], [
      'name' => 'Black Washed Jeans',
      'description' => 'Classic black washed jeans with a relaxed straight fit, perfect for everyday casual wear.',
      'price' => 17.00,
      'image_url' => 'https://i.pinimg.com/736x/b2/89/c7/b289c7911f76508d6ad84f5aedf2ea77.jpg',
      'brand' => 'Levis'
      ]);
      $mens->products()->updateOrCreate(['slug' => 'navy-check-overshirt'], [
      'name' => 'Navy Check Overshirt',
      'description' => 'Stylish navy check overshirt layered over a long sleeve tee, offering a modern casual look.',
      'price' => 13.00,
      'image_url' => 'https://i.pinimg.com/736x/1d/a9/b7/1da9b7ee91f359337924cac385fec7d8.jpg',
      'brand' => 'COS'
       ]);
      $mens->products()->updateOrCreate(['slug' => 'white-slim-fit-jeans'], [
      'name' => 'White Slim Fit Jeans',
      'description' => 'Crisp white slim fit jeans designed for a sharp, clean look with everyday comfort.',
      'price' => 12.99,
      'image_url' => 'https://i.pinimg.com/736x/6b/07/46/6b074680575a0acb9e223c9f8957c2db.jpg',
      'brand' => 'Zara'
       ]);
      $mens->products()->updateOrCreate(['slug' => 'brown-leather-style-jacket'], [
      'name' => 'Brown Leather Style Jacket',
      'description' => 'Premium brown leather-style jacket with a relaxed fit, perfect for layering over casual outfits.',
      'price' => 49.99,
      'image_url' => 'https://i.pinimg.com/1200x/00/57/71/005771b1e7f450e6134db54417c83557.jpg',
      'brand' => 'COS'
       ]);
      $mens->products()->updateOrCreate(['slug' => 'black-utility-leather-jacket'], [
      'name' => 'Black Utility Leather Jacket',
      'description' => 'Sleek black leather jacket with front pockets and a structured fit.',
      'price' => 79.99,
      'image_url' => 'https://i.pinimg.com/1200x/e3/be/cc/e3beccfe455d39a46e311996615d8079.jpg',
      'brand' => 'Zara'
      ]);
     $mens->products()->updateOrCreate(['slug' => 'navy-zip-up-jacket'], [
      'name' => 'Navy Zip-Up Jacket',
      'description' => 'Minimal navy zip-up jacket with a clean silhouette, perfect for everyday wear and layering.',
      'price' => 69.99,
      'image_url' => 'https://i.pinimg.com/1200x/c5/a2/7c/c5a27c724b2131e8c6db3e00cf3e211b.jpg',
      'brand' => 'Uniqlo'
      ]);
    $mens->products()->updateOrCreate(['slug' => 'green-zip-neck-jumper'], [
      'name' => 'Green Zip Neck Jumper',
      'description' => 'Smart green zip-neck jumper with a refined fit, perfect for layering over shirts. ',
      'price' => 14.00,
      'image_url' => 'https://i.pinimg.com/1200x/cb/89/fd/cb89fd877865b347e2cb583fca18b714.jpg',
      'brand' => 'Reiss'
      ]);
    $mens->products()->updateOrCreate(['slug' => 'brown-graphic-knit-jumper'], [
      'name' => 'Brown Graphic Knit Jumper',
      'description' => 'Statement brown jumper featuring an artistic graphic design.',
      'price' => 12.99,
      'image_url' => 'https://i.pinimg.com/1200x/e3/63/3d/e3633d7fd0af6b1d50415f687dd53f97.jpg',
      'brand' => 'ASOS'
      ]);
      $mens->products()->updateOrCreate(['slug' => 'baby-blue-knit-jumper'], [
      'name' => 'Baby Blue Knit Jumper',
      'description' => 'Soft baby blue knit jumper with a relaxed fit, perfect for a clean and modern casual style.',
      'price' => 11.00,
      'image_url' => 'https://i.pinimg.com/1200x/ec/fd/ee/ecfdee29154a6d8eb88586b6040388c7.jpg',
      'brand' => 'COS'
       ]);
      $mens->products()->updateOrCreate(['slug' => 'blue-check-knit-beanie'], [
      'name' => 'Blue Check Knit Beanie',
      'description' => 'Stylish blue check patterned beanie with a snug fit, perfect for colder days.',
      'price' => 4.99,
      'image_url' => 'https://i.pinimg.com/736x/a8/98/fe/a898fe7628de37da17d4bff162883f0f.jpg',
      'brand' => 'LV Style'
      ]);
      $mens->products()->updateOrCreate(['slug' => 'green-baseball-cap'], [
      'name' => 'Green Baseball Cap',
      'description' => 'Classic green baseball cap with a curved brim, perfect for everyday casual wear.',
      'price' => 7.00,
     'image_url' => 'https://i.pinimg.com/1200x/f5/3a/d4/f53ad47e1df47b7d6599b8df51bbc37e.jpg',
      'brand' => 'New Era'
       ]);
      $mens->products()->updateOrCreate(['slug' => 'grey-knit-beanie'], [
      'name' => 'Grey Knit Beanie',
      'description' => 'Warm grey knit beanie with a minimal design, ideal for winter outfits.',
      'price' => 4.99,
      'image_url' => 'https://i.pinimg.com/1200x/b2/96/17/b29617fe7aae96e5eeaa9406fba95501.jpg',
      'brand' => 'The North Face'
         ]);

        // Womens
        $womens->products()->updateOrCreate(['slug' => 'floral-summer-dress'], [
            'name' => 'Floral Summer Dress',
            'description' => 'Light and airy floral print dress.',
            'price' => 8.50,
            'image_url' => 'https://www.crewclothing.co.uk/images/products/large/WWJ062_FOLKMAUVE.jpg',
            'brand' => 'Zara'
        ]);
        $womens->products()->updateOrCreate(['slug' => 'cashmere-sweater'], [
            'name' => 'Soft Cashmere Sweater',
            'description' => 'Luxuriously soft and warm sweater for winter.',
            'price' => 20.00,
            'image_url' => 'https://riseandfall.co/cdn/shop/files/Rise_Fall_CashmereMerinoSaddleSleeveCrewNeckJumperinGraphite_03_d4675dba-69a9-4cb8-99fd-77ce08a61f86.jpg?crop=center&format=webp&height=800&v=1761167623&width=800',
            'brand' => 'Everlane'
        ]);
        $womens->products()->updateOrCreate(['slug' => 'tailored-marl-midi-dress'], [
        'name' => 'Tailored Marl Midi Dress',
        'description' => 'A tailored sleeveless midi dress with a defined waist, side-buckle detailing and practical pockets.',
         'price' => 12.99,
         'image_url' => 'https://i.pinimg.com/1200x/c6/76/cf/c676cfdc60f16d0f72cfeb2971264926.jpg',
         'brand' => 'KM'
       ]);
       $womens->products()->updateOrCreate(['slug' => 'straight-leg-jeans'], [
       'name' => 'Straight Leg Jeans',
      'description' => 'Relaxed low-rise pinstripe jeans with a straight leg and classic five-pocket design.',
      'price' => 20.00,
      'image_url' => 'https://i.pinimg.com/1200x/d3/73/15/d373159b9c54353f740098a7484947db.jpg',
      'brand' => 'Urban Outfitters'
       ]);
      $womens->products()->updateOrCreate(['slug' => 'light-pink-poplin-blouse'], [
      'name' => 'Light Pink Poplin Blouse',
      'description' => 'Light pink poplin blouse with a flared hem, button-up front and shirred detailing.',
      'price' => 8.00,
      'image_url' => 'https://i.pinimg.com/736x/95/80/e5/9580e5a7d2f6b547a582fb6923998adc.jpg',
       'brand' => 'Motel'
       ]);

       $womens->products()->updateOrCreate(['slug' => 'double-breasted-peacoat'], [
       'name' => 'Double-Breasted Peacoat',
      'description' => 'Chic short peacoat with a flattering waist, secure zip pockets and polished detailing.',
       'price' => 32.00,
      'image_url' => 'https://i.pinimg.com/736x/78/22/d2/7822d255ce2f2cbf59c47a0e0947e60e.jpg',
      'brand' => 'Livaa Studio'
       ]);

      $womens->products()->updateOrCreate(['slug' => 'classic-structured-purse'], [
      'name' => 'Classic Structured Purse',
      'description' => 'Spacious, organised purse with a sleek finish and versatile style.',
      'price' => 14.00,
      'image_url' => 'https://i.pinimg.com/1200x/e3/45/99/e34599056445437aa03ecc3a947096cf.jpg',
      'brand' => 'Fenwick'
     ]);
     $womens->products()->updateOrCreate(['slug' => 'navy-pinstripe-mini-dress'], [
      'name' => 'Navy Pinstripe Mini Dress',
      'description' => 'Sleeveless navy pinstripe mini dress with a clean tailored silhouette.',
      'price' => 22.00,
      'image_url' => 'https://i.pinimg.com/1200x/70/07/32/700732895864b99068fbf5a3fa8e8c38.jpg',
      'brand' => 'Mango'
      ]);

    $womens->products()->updateOrCreate(['slug' => 'brown-midi-dress'], [
      'name' => 'Brown Midi Dress',
      'description' => 'Elegant brown midi dress with a fitted waist and soft drape.',
      'price' => 13.00,
      'image_url' => 'https://i.pinimg.com/1200x/b6/f9/46/b6f9464d2870789e696e8e55518afda4.jpg',
      'brand' => 'Reformation'
      ]);
    $womens->products()->updateOrCreate(['slug' => 'taupe-satin-midi-skirt'], [
      'name' => 'Taupe Satin Midi Skirt',
      'description' => 'Soft taupe satin midi skirt with a fluid drape.',
      'price' => 8.99,
      'image_url' => 'https://i.pinimg.com/1200x/f0/be/69/f0be6961c3cab445c109150ccb47a8c9.jpg',
      'brand' => 'H&M'
     ]);

   $womens->products()->updateOrCreate(['slug' => 'white-mermaid-maxi-skirt'], [
      'name' => 'White Mermaid Maxi Skirt',
      'description' => 'Elegant white maxi skirt with a softly flared hem.',
      'price' => 11.00,
      'image_url' => 'https://i.pinimg.com/736x/17/54/3e/17543e1aa27ab1a109e022bd333f152e.jpg',
      'brand' => 'House of CB'
     ]);
    $womens->products()->updateOrCreate(['slug' => 'brown-pinstripe-wide-leg-trousers'], [
       'name' => 'Brown Pinstripe Wide Leg Trousers',
      'description' => 'High-waisted brown pinstripe trousers with a wide leg fit, designed for a smart and flattering silhouette.',
      'price' => 23.00,
      'image_url' => 'https://i.pinimg.com/736x/c9/24/80/c924807a6df8de49e198db057d96c264.jpg',
      'brand' => 'Zara'
    ]);
    $womens->products()->updateOrCreate(['slug' => 'brown-wrap-waist-shirt'], [
      'name' => 'Brown Wrap Waist Shirt',
      'description' => 'Structured brown shirt with a wrap waist detail, giving a sharp and elegant tailored look.',
      'price' => 25.00,
      'image_url' => 'https://i.pinimg.com/736x/2f/74/2b/2f742bc6b0c0186f9ef40ace4e3219d8.jpg',
      'brand' => 'House of CB'
     ]);
   
    $womens->products()->updateOrCreate(['slug' => 'navy-off-shoulder-top'], [
      'name' => 'Navy Off Shoulder Top',
      'description' => 'Soft navy off-the-shoulder top with a draped silhouette.',
      'price' => 6.99,
      'image_url' => 'https://i.pinimg.com/1200x/ed/17/fe/ed17fe1964de3758b5e4df6b7f457c1a.jpg',
      'brand' => 'Mango'
     ]);

     $womens->products()->updateOrCreate(['slug' => 'grey-button-knit-top'], [
      'name' => 'Grey Button Knit Top',
      'description' => 'Fitted grey knit top with a button front and soft stretch fabric.',
      'price' => 7.00,
      'image_url' => 'https://i.pinimg.com/1200x/e1/87/32/e18732b4231878211da1235b52f0f1d6.jpg',
      'brand' => 'PrettyLittleThing'
      ]);

    $womens->products()->updateOrCreate(['slug' => 'beige-cropped-jacket'], [
      'name' => 'Beige Cropped Jacket',
      'description' => 'Minimal beige cropped jacket with a clean zip front.',
      'price' => 12.00,
      'image_url' => 'https://i.pinimg.com/736x/07/d3/68/07d368536fe9e612a91f8ca2c69a2eda.jpg',
      'brand' => 'H&M'
    ]);

     $womens->products()->updateOrCreate(['slug' => 'black-puffer-jacket'], [
      'name' => 'Black Puffer Jacket',
      'description' => 'Warm black puffer jacket with a high collar and padded finish.',
      'price' => 49.99,
      'image_url' => 'https://i.pinimg.com/1200x/3e/c7/b2/3ec7b2bd54c245f7bf99bce5454e3e7b.jpg',
      'brand' => 'Superdry'
    ]);
     $womens->products()->updateOrCreate(['slug' => 'navy-shoulder-handbag'], [
      'name' => 'Navy Shoulder Handbag',
      'description' => 'Stylish navy shoulder handbag with multiple front pockets and silver hardware detailing.',
      'price' => 20.00,
      'image_url' => 'https://i.pinimg.com/1200x/8c/fa/08/8cfa08ad6a324e99435fedf422037e26.jpg',
      'brand' => 'Catwalk'
    ]);

    $womens->products()->updateOrCreate(['slug' => 'olive-green-vintage-handbag'], [
      'name' => 'Olive Green Vintage Handbag',
      'description' => 'Classic olive green handbag with vintage-style buckles and structured design.',
      'price' => 18.00,
      'image_url' => 'https://i.pinimg.com/736x/c9/37/6d/c9376dd68e20f0de1ba8e4bde11a5d63.jpg',
      'brand' => 'River Island'
     ]);

    $womens->products()->updateOrCreate(['slug' => 'burgundy-leather-tote'], [
      'name' => 'Burgundy Leather Tote',
      'description' => 'Elegant burgundy leather tote bag with a smooth finish.',
      'price' => 13.99,
       'image_url' => 'https://i.pinimg.com/736x/92/31/63/9231631bc2283a4077b2b3a9be5b67cd.jpg',
      'brand' => 'Coach'
     ]);
        // Footwear
        $footwear->products()->updateOrCreate(['slug' => 'running-shoes'], [
            'name' => 'High-Performance Running Shoes',
            'description' => 'Lightweight shoes for long-distance running.',
            'price' => 60.00,
            'image_url' => 'https://encrypted-tbn3.gstatic.com/shopping?q=tbn:ANd9GcSc8VheUvO_jb4mMjiVfTbQY8xzd9qRJm91-CgI0NeqYMdz6GwtbChFXd1l54EbDJIPBVI-yCbMMVBJ7MUfk9t2fVEG1cVqOQ582SAbi1tPZk2sdadG1Bly5KESLO6DoBapuygUhtc&usqp=CAc',
            'brand' => 'Nike'
        ]);
        $footwear->products()->updateOrCreate(['slug' => 'leather-boots'], [
            'name' => 'Classic Leather Ankle Boots',
            'description' => 'Durable and stylish leather boots.',
            'price' => 80.00,
            'image_url' => 'https://cdn.media.amplience.net/i/drmartens/12308001.80.jpg', 
            'brand' => 'Doc Martens'
        ]);
        $footwear->products()->updateOrCreate(['slug' => 'm1000-faux-leather-trainers'], [
        'name' => 'M1000 Faux Leather Trainers',
         'description' => 'Retro-inspired M1000 trainers with sleek panelling, breathable mesh and ABZORB cushioning.',
           'price' => 75.00,
            'image_url' => 'https://i.pinimg.com/736x/d3/a6/70/d3a670b44b21cb49bb00103a0ffbed28.jpg',
             'brand' => 'JD Sports'
            
         ]);

        $footwear->products()->updateOrCreate(['slug' => 'chocolate-leather-trucker-boots'], [
         'name' => 'Chocolate Leather Trucker Boots',
          'description' => 'Matte chocolate leather trucker boots with a pull-on design and mid block heel.',
         'price' => 25.00,
          'image_url' => 'https://i.pinimg.com/736x/8d/ef/e8/8defe85443619cf9c80624e44e14d1a1.jpg',
           'brand' => 'ASOS'
        ]);
        $footwear->products()->updateOrCreate(['slug' => 'classic-black-formal-shoes'], [
        'name' => 'Classic Black Formal Shoes',
        'description' => 'Elegant black formal shoes perfect for business and formal occasions.',
        'price' => 30.00,
         'image_url' => 'https://i.pinimg.com/736x/e2/f2/b6/e2f2b6e2e8236c25aaf5f0498d056f7e.jpg',
        'brand' => 'Clarks'
         ]);

         $footwear->products()->updateOrCreate(['slug' => 'red-patent-slingback-heels'], [
         'name' => 'Red Patent Slingback Heels',
          'description' => 'Stylish red slingback heels with a glossy finish.',
          'price' => 28.00,
          'image_url' => 'https://i.pinimg.com/736x/01/76/7a/01767a9c2e51eb298c1dd9a48b404818.jpg',
            'brand' => 'ZARA'
        ]);

        $footwear->products()->updateOrCreate(['slug' => 'brown-mesh-heeled-shoes'], [
        'name' => 'Brown Mesh Heeled Shoes',
        'description' => 'Elegant brown mesh heels with delicate detailing.',
       'price' => 17.00,
       'image_url' => 'https://i.pinimg.com/1200x/11/b9/1a/11b91a450c82ca191da108c5938aaca8.jpg',
       'brand' => 'ASOS'
         ]);

       $footwear->products()->updateOrCreate(['slug' => 'black-ballerina-flats'], [
        'name' => 'Black Ballerina Flats',
       'description' => 'Comfortable black ballerina flats with a sleek design.',
       'price' => 14.99,
       'image_url' => 'https://i.pinimg.com/736x/b0/4a/4b/b04a4bb6c0db6e16e79daa69b5c05eb9.jpg',
       'brand' => 'H&M'
       ]);
       $footwear->products()->updateOrCreate(['slug' => 'nike-brown-mesh-trainers'], [
      'name' => 'Nike Brown Mesh Trainers',
      'description' => 'Breathable brown mesh trainers with cushioned sole and modern sporty design for everyday comfort.',
      'price' => 65.00,
      'image_url' => 'https://i.pinimg.com/736x/a3/08/45/a30845ce53c769c8945ea8fbc08ec284.jpg',
      'brand' => 'Nike'
    ]);

    $footwear->products()->updateOrCreate(['slug' => 'chunky-grey-beige-trainers'], [
     'name' => 'Chunky Grey & Beige Trainers',
     'description' => 'Chunky retro-style trainers with grey and beige tones, offering comfort and a bold streetwear look.',
     'price' => 70.00,
     'image_url' => 'https://i.pinimg.com/736x/c1/f3/b3/c1f3b381f6835b3b9523173797adce07.jpg',
     'brand' => 'Reebok'
     ]);
  
     $footwear->products()->updateOrCreate(['slug' => 'adidas-samba-classic'], [
    'name' => 'Adidas Samba Classic',
    'description' => 'Iconic Adidas Samba trainers featuring black and white leather with a timeless design.',
    'price' => 75.00,
    'image_url' => 'https://i.pinimg.com/1200x/21/89/e7/2189e7a8653629ffd7a1907bc0e7449f.jpg',
    'brand' => 'Adidas'
      ]);

    $footwear->products()->updateOrCreate(['slug' => 'new-balance-574-blue'], [
      'name' => 'New Balance 574 Trainers',
      'description' => 'Classic New Balance 574 trainers in blue with premium comfort and everyday versatility.',
      'price' => 80.00,
      'image_url' => 'https://freemans.scene7.com/is/image/OttoUK/553w/new-balance-ml574-core-lace-up-trainers~77079501FRSC.jpg',
      'brand' => 'New Balance'
      ]);

      $footwear->products()->updateOrCreate(['slug' => 'adidas-gazelle-blue'], [
      'name' => 'Adidas Gazelle Indoor Trainers (Blue)',
      'description' => 'Classic Adidas Gazelle trainers in blue suede with a timeless design and gum sole.',
      'price' => 85.00,
      'image_url' => 'https://freemans.scene7.com/is/image/OttoUK/553w/adidas-originals-gazelle-indoor-trainers~74036061FRSC.jpg',
      'brand' => 'Adidas'
     ]);

     $footwear->products()->updateOrCreate(['slug' => 'adidas-grey-ballerina'], [
      'name' => 'Adidas Grey Ballerina Trainers',
      'description' => 'Lightweight grey ballerina-style trainers with a sleek fit and flexible comfort.',
      'price' => 60.00,
      'image_url' => 'https://freemans.scene7.com/is/image/OttoUK/553w/adidas-sportswear-barreda-mary-jane-ballerina-trainers~72931807FRSC.jpg',
      'brand' => 'Adidas'
     ]);

     $footwear->products()->updateOrCreate(['slug' => 'new-balance-373-burgundy'], [
      'name' => 'New Balance 373 Trainers (Burgundy)',
      'description' => 'Stylish burgundy trainers with classic New Balance comfort and everyday wearability.',
      'price' => 70.00,
      'image_url' => 'https://freemans.scene7.com/is/image/OttoUK/553w/new-balance-373-lace-up-trainers~78683251FRSC.jpg',
      'brand' => 'New Balance'
     ]);

    $footwear->products()->updateOrCreate(['slug' => 'new-balance-beige-leopard'], [
      'name' => 'New Balance Beige Leopard Trainers',
      'description' => 'Trendy beige trainers with subtle leopard print detail and cushioned sole for all-day comfort.',
      'price' => 75.00,
      'image_url' => 'https://freemans.scene7.com/is/image/OttoUK/553w/new-balance-non-slip-breathable-trainers~75644309FRSC.jpg',
      'brand' => 'New Balance'
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
            'price' => 39.99,
            'image_url' => 'https://bedable.com/cdn/shop/files/Duvet.jpg?v=1763987683&width=1500',
            'brand' => 'IKEA'
        ]);
        $bedding->products()->updateOrCreate(['slug' => 'extra-long-sheets'], [
       'name' => 'Neutral Stripe Cover Set',
       'description' => 'Soft and breathable striped cotton bedding set.',
       'price' => 11.50,
       'image_url' => 'https://target.scene7.com/is/image/Target/GUEST_24cf91dc-37a8-49fc-a63a-b99121904ecd?wid=300&hei=300&fmt=pjpeg',
      'brand' => 'Threshold'
        ]);
        $bedding->products()->updateOrCreate(['slug' => 'premium-white-pillows'], [
        'name' => 'Premium White Pillows (Set of 2)',
        'description' => 'Soft and supportive pillows designed for a comfortable night’s sleep.',
         'price' => 24.99,
          'image_url' => 'https://images.unsplash.com/photo-1600414428640-f78a67c2aa3b?q=80&w=1073&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D',
         'brand' => 'TESCO'
        ]);

        $bedding->products()->updateOrCreate(['slug' => 'cozy-white-fleece-blanket'], [
       'name' => 'Cozy White Fleece Blanket',
       'description' => 'Warm and ultra soft fleece blanket ',
       'price' => 12.99,
       'image_url' => 'https://i.pinimg.com/1200x/ad/51/09/ad510913206d6ba9735382ffea1624b2.jpg',
       'brand' => 'Home Comfort'
      ]);

      $bedding->products()->updateOrCreate(['slug' => 'soft-pink-bedding-set'], [
      'name' => 'Soft Pink Bedding Set',
      'description' => 'Stylish pink duvet cover set with matching pillowcases.',
      'price' => 13.50,
      'image_url' => 'https://plus.unsplash.com/premium_photo-1670869816778-3dd1ddf9adf5?q=80&w=880&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D',
      'brand' => 'Urban Living'
     ]);

    $bedding->products()->updateOrCreate(['slug' => 'beige-satin-bedding-set'], [
      'name' => 'Beige Satin Bedding Set',
      'description' => 'Luxury satin bedding set with a smooth finish for a premium feel.',
      'price' => 22.00,
      'image_url' => 'https://i.pinimg.com/736x/75/12/9b/75129b95ba3f00bda281d776d338281b.jpg',
      'brand' => 'Luxury Sleep'
      ]);

     $bedding->products()->updateOrCreate(['slug' => 'deep-purple-bedding-set'], [
      'name' => 'Deep Purple Bedding Set',
      'description' => 'Bold and elegant purple bedding set.',
      'price' => 10.00,
      'image_url' => 'https://i.pinimg.com/736x/7d/f1/05/7df10576b4425418b25f64e265225cda.jpg',
      'brand' => 'Modern Home'
     ]);

    $bedding->products()->updateOrCreate(['slug' => 'green-striped-duvet-set'], [
      'name' => 'Green Striped Duvet Set',
      'description' => 'Fresh green striped duvet set with a soft texture and modern design.',
      'price' => 11.99,
      'image_url' => 'https://freemans.scene7.com/is/image/OttoUK/553w/catherine-lansfield-seersucker-frill-stripe-duvet-cover-set---green~59H659FRSP.jpg',
      'brand' => 'Catherine Lansfield'
     ]);


        // Decor
        $decor->products()->updateOrCreate(['slug' => 'string-lights'], [
            'name' => 'LED String Lights',
            'description' => 'Add a cozy ambiance to your room.',
            'price' => 8.00,
            'image_url' => 'https://target.scene7.com/is/image/Target/GUEST_dafcb163-472a-4aec-9a0f-c59dd03b7de8?wid=300&hei=300&fmt=pjpeg',
            'brand' => 'ASDA'
        ]);
        $decor->products()->updateOrCreate(['slug' => 'mini-fridge'], [
            'name' => 'Compact Mini Fridge',
            'description' => 'Perfect for keeping snacks and drinks cold.',
            'price' => 22.00,
            'image_url' => 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTyS3s86ENVh-5u5vCaU_1sA0DjordeR1XeoA&s', 
            'brand' => 'RCA'
        ]);
        $decor->products()->updateOrCreate(['slug' => 'decorative-plant-pot'], [
         'name' => 'Decorative Plant Pot Set',
          'description' => 'Minimal plant pot set to add a fresh and calming vibe to your dorm.',
           'price' => 7.00,
           'image_url' => 'https://i.pinimg.com/1200x/e1/5f/74/e15f7474bfb98c68d42f60435eb31916.jpg',
            'brand' => 'Home Style'
          ]);

      $decor->products()->updateOrCreate(['slug' => 'pink-glass-candle-set'], [
       'name' => 'Pink Glass Candle Set',
      'description' => 'Aesthetic scented candles in glass jars.',
      'price' => 9.00,
      'image_url' => 'https://i.pinimg.com/1200x/5b/ae/93/5bae93bf5da90b68ed0c3bcb9c3b99b7.jpg',
      'brand' => 'Glow Home'
     ]);

     $decor->products()->updateOrCreate(['slug' => 'papasan-chair'], [
     'name' => 'Papasan Lounge Chair',
     'description' => 'Super comfy cushioned chair perfect for relaxing or studying.',
     'price' => 50.00,
   'image_url' => 'https://freemans.scene7.com/is/image/OttoUK/553w/desser-papasan-chair~86W152FRSP_COL_CLOUD.jpg',
     'brand' => 'IKEA'
     ]);

      $decor->products()->updateOrCreate(['slug' => 'hollywood-vanity-mirror'], [
    'name' => 'Hollywood Vanity Mirror',
    'description' => 'LED light-up mirror with adjustable brightness.',
    'price' => 25.00,
    'image_url' => 'https://freemans.scene7.com/is/image/OttoUK/553w/carmen-c85050wht-hollywood-9-bulb-vanity-mirror-with-metal-frame---white~83H406FRSP.jpg',
    'brand' => 'Carmen'
     ]);
      $decor->products()->updateOrCreate(['slug' => 'space-exploration-poster'], [
     'name' => 'Space Exploration Poster',
     'description' => 'Aesthetic space-themed poster a modern cosmic vibe.',
      'price' => 9.99,
     'image_url' => 'https://i.pinimg.com/736x/8f/0c/01/8f0c014bdd8efc1957cbfc34b34206da.jpg',
    'brand' => 'Wall Art Co'
    ]);

      $decor->products()->updateOrCreate(['slug' => 'radiohead-vintage-poster'], [
     'name' => 'Radiohead Vintage Poster',
     'description' => 'Retro Radiohead tour poster for a classic indie aesthetic.',
     'price' => 11.99,
     'image_url' => 'https://i.pinimg.com/736x/0c/5f/d2/0c5fd217d5d0e4ad8a675aa50e1de793.jpg',
     'brand' => 'Music Prints'
    ]);

        // Storage
        $storage->products()->updateOrCreate(['slug' => 'under-bed-storage'], [
            'name' => 'Under-Bed Storage Containers (Set of 2)',
            'description' => 'Maximise space with rolling under-bed storage.',
            'price' => 29.00,
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
        $storage->products()->updateOrCreate(['slug' => 'bamboo-shoe-rack'], [
        'name' => 'Bamboo Shoe Rack',
      'description' => '3-tier bamboo shoe rack organising footwear neatly in small spaces.',
      'price' => 22.99,
      'image_url' => 'https://i.pinimg.com/736x/c5/27/6c/c5276ceb0383de9c870441be22227343.jpg',
      'brand' => 'Home Storage'
         ]);

          $storage->products()->updateOrCreate(['slug' => 'rolling-storage-cart'], [
          'name' => '3-Tier Rolling Storage Cart',
           'description' => 'Compact storage cart with wheels for bathroom .',
           'price' => 19.99,
         'image_url' => 'https://i.pinimg.com/736x/75/c3/03/75c3030c7aa4146528120f0471d1fd72.jpg',
         'brand' => 'IKEA Style'
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
            'image_url' => 'https://i.pinimg.com/1200x/61/db/95/61db9531a3b80326641a8c5162f84a03.jpg',
            'brand' => 'Moleskine'
        ]);
        $notebooks->products()->updateOrCreate(['slug' => 'spiral-notebook-set'], [
            'name' => '5 Subject Spiral Notebook (3 Pack)',
            'description' => 'Cost-effective notebooks for all your classes.',
            'price' => 15.00,
            'image_url' => 'https://m.media-amazon.com/images/I/61g0PzOqgIL.jpg', 
            'brand' => 'Mead'
        ]);
        $notebooks->products()->updateOrCreate(['slug' => 'classic-lined-notebook'], [
        'name' => 'Classic Lined Notebook',
         'description' => 'Minimal lined notebook perfect for lectures, notes, and daily planning.',
          'price' => 6.99,
        'image_url' => 'https://i.pinimg.com/736x/a2/ca/7b/a2ca7b7dcce9a3c88f891178cfe7295c.jpg',
          'brand' => 'Papier'
         ]);

        $notebooks->products()->updateOrCreate(['slug' => 'floral-art-spiral-notebook'], [
        'name' => 'Floral Art Spiral Notebook',
        'description' => 'Aesthetic spiral notebook with artistic floral design.',
        'price' => 8.99,
        'image_url' => 'https://i.pinimg.com/1200x/17/15/89/1715894d62437386643b9a47b06c7789.jpg',
       'brand' => 'Art Print Co.'
        ]);
        $notebooks->products()->updateOrCreate(['slug' => 'mouse-notebook'], [
        'name' => 'Wrendale Mouse Notebook',
         'description' => 'Cute illustrated notebook featuring a mouse design. Perfect for notes, journaling, or school.',
          'price' => 7.00,
        'image_url' => 'https://freemans.scene7.com/is/image/OttoUK/553w/wrendale-designs-signature-stationery-notebook-mouse~59S367FRSC.jpg',
          'brand' => 'Wrendale Designs'
        ]);

         $notebooks->products()->updateOrCreate(['slug' => 'beach-wave-notebook'], [
          'name' => 'Beach Wave Hardcover Notebook',
          'description' => 'Stylish notebook with a modern beach-inspired wave design and durable hardcover.',
          'price' => 5.00,
          'image_url' => 'https://freemans.scene7.com/is/image/OttoUK/553w/papier-beach-towel-hardcover-lined-notebook-green~76E087FRSC.jpg',
         'brand' => 'Papier'
         ]);

       $notebooks->products()->updateOrCreate(['slug' => 'floral-bird-notebook'], [
       'name' => 'Floral Bird Notebook',
       'description' => 'Beautiful patterned notebook with floral and bird illustrations for a premium feel.',
       'price' => 4.50,
       'image_url' => 'https://freemans.scene7.com/is/image/OttoUK/553w/papier-quilted-daydream-lined-notebook~76B097FRSC.jpg',
       'brand' => 'Papier'
       ]);

      $notebooks->products()->updateOrCreate(['slug' => 'daily-planner-notebook'], [
      'name' => 'Daily Planner Notebook',
      'description' => 'Organise your day with this vibrant daily planner notebook, perfect for productivity.',
      'price' => 3.00,
      'image_url' => 'https://freemans.scene7.com/is/image/OttoUK/553w/papier-colourblock-daily-planner~76K100FRSC.jpg',
      'brand' => 'Papier'
       ]);

        // Pens
        $pens->products()->updateOrCreate(['slug' => 'gel-pen-set'], [
            'name' => 'Assorted Gel Pen Set (12 Pack)',
            'description' => 'Smooth writing gel pens in various colors.',
            'price' => 9.50,
            'image_url' => 'https://japanesetaste.co.uk/cdn/shop/files/Pilot-Juice-Gel-Ink-Ballpoint-Pens-0-5mm-12-Color-Set-3-2024-07-23T04_58_41.519Z.jpg?v=1743421032&width=600', 
            'brand' => 'Pilot'
        ]);
        $pens->products()->updateOrCreate(['slug' => 'highlighter-set'], [
            'name' => 'Pastel Highlighter Set',
            'description' => 'Soft colored highlighters for note taking.',
            'price' => 3.99,
            'image_url' => 'https://cdn.shopify.com/s/files/1/0659/6388/4787/products/SB56646_STABILO-Boss-Pastel-Highlighter-Assorted-Set-of-6_P1.jpg', 
            'brand' => 'Stabilo'
        ]);
         $pens->products()->updateOrCreate(['slug' => 'fine-tip-black-ink-pens'], [
         'name' => 'Fine Tip Black Ink Pens (6 Pack)',
         'description' => 'Precision 0.5mm fine tip pens for clean, smooth writing.',
         'price' => 6.00,
         'image_url' => 'https://i.pinimg.com/1200x/ea/42/9b/ea429be5a3841497370a3fc5383a52a1.jpg',
         'brand' => 'Muji'
         ]);

         $pens->products()->updateOrCreate(['slug' => 'mechanical-pencil-set'], [
        'name' => 'Mechanical Pencil Set with HB Leads',
        'description' => 'Durable mechanical pencils with refillable HB leads.',
        'price' => 2.50,
        'image_url' => 'https://i.pinimg.com/736x/cc/ea/d6/ccead650eb3d63a74216176ea140b71e.jpg',
        'brand' => 'Pentel'
         ]);

         $pens->products()->updateOrCreate(['slug' => 'gel-pen-set-red-black'], [
         'name' => 'Gel Pen Set (Red & Black)',
         'description' => 'Smooth writing gel pens in red and black, perfect for everyday use.',
          'price' => 5.00,
          'image_url' => 'https://i.pinimg.com/736x/08/d6/31/08d6315d31a245cc6fc135397c1f8e49.jpg',
           'brand' => 'Uni-ball'
         ]);

        $pens->products()->updateOrCreate(['slug' => 'essential-pen-pack'], [
           'name' => 'Essential Pen Pack',
         'description' => 'Complete pen set including multiple styles for writing, drawing, and note-taking.',
         'price' => 7.00,
         'image_url' => 'https://i.pinimg.com/1200x/7a/23/55/7a2355c593ca0092aea78362f547a739.jpg',
         'brand' => 'Typo'
        ]);

         $pens->products()->updateOrCreate(['slug' => 'pastel-highlighter-set'], [
          'name' => 'Pastel Highlighter Set',
         'description' => 'Soft pastel highlighters ideal for studying, planning, and organising notes.',
         'price' => 3.50,
          'image_url' => 'https://i.pinimg.com/1200x/8c/01/de/8c01de13c5bdb784c32c4b71b2ed6347.jpg',
          'brand' => 'Altitude'
        ]);

        $pens->products()->updateOrCreate(['slug' => 'blue-frixion-pen-set'], [
         'name' => 'Blue Frixion Erasable Pens',
         'description' => 'Erasable blue ink pens for clean and mistake-free writing.',
         'price' => 11.00,
         'image_url' => 'https://i.pinimg.com/736x/2c/0b/f8/2c0bf80f5ee08dd3d4848ef921faa41b.jpg',
         'brand' => 'Pilot'
        ]);

        // Art Supplies
        $art_supplies->products()->updateOrCreate(['slug' => 'sketch-pad'], [
            'name' => 'Professional Sketch Pad',
            'description' => 'Heavyweight paper perfect for sketching and drawing.',
            'price' => 7.00,
            'image_url' => 'https://m.media-amazon.com/images/I/71+QK5pJQmL._AC_UF894,1000_QL80_.jpg', 
            'brand' => 'Strathmore'
        ]);
        
        $art_supplies->products()->updateOrCreate(['slug' => 'watercolor-paint-set'], [
            'name' => '24-Color Watercolor Paint Set',
            'description' => 'Portable set of vibrant watercolor paints.',
            'price' => 13.00,
            'image_url' => 'https://uk.winsornewton.com/cdn/shop/files/117600.jpg?v=1760698185',
            'brand' => 'Winsor & Newton'
        ]);
        $art_supplies->products()->updateOrCreate(['slug' => 'professional-paint-brush-set'], [
        'name' => 'Professional Paint Brush Set',
        'description' => 'High-quality paint brushes in various sizes, perfect for acrylic, watercolor, and art projects.',
       'price' => 10.00,
       'image_url' => 'https://i.pinimg.com/1200x/09/ef/fb/09effbaa086a00978ab4a93b745d67b8.jpg',
       'brand' => 'Daler Rowney'
         ]);

        $art_supplies->products()->updateOrCreate(['slug' => 'fine-liner-art-pen-set'], [
       'name' => 'Fine Liner Art Pen Set (4 Pack)',
       'description' => 'Precision fineliner pens ideal for sketching, drawing, and detailed artwork.',
       'price' => 3.69,
      'image_url' => 'https://i.pinimg.com/736x/9a/a5/fe/9aa5fe527a1883ceb68ca365ba23f18c.jpg',
      'brand' => 'Faber-Castell'
]);
    }
}