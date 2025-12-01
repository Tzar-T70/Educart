<?php
$products = [
    [
        "img"   => "images/home/cooking1.jpg",
        "alt"   => "Baking Kit",
        "name"  => "Baking Kit",
        "price" => "£8.99"
    ],
    [
        "img"   => "images/home/bedding1.jpg",
        "alt"   => "Bedding",
        "name"  => "Bedding",
        "price" => "£13.00"
    ],
    [
        "img"   => "images/home/cleaning1.jpg",
        "alt"   => "Cleaning Essentials",
        "name"  => "Cleaning Essentials",
        "price" => "£8.50"
    ],
    [
        "img"   => "images/home/toielt1.jpg",
        "alt"   => "Toiletries",
        "name"  => "Toiletries",
        "price" => "£23.00"
    ],
    [
        "img"   => "images/home/decor1.jpg",
        "alt"   => "Dining Set",
        "name"  => "Dining Set",
        "price" => "£9.50"
    ]
];
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Home Appliance Collection | Educart</title>

  <style>
    body {
      font-family: 'Segoe UI', Arial, sans-serif;
      margin: 0;
      padding: 0;
      background-color: #fafafa;
    }

    header {
      background: linear-gradient(135deg, #5E17EB);
      color: white;
      text-align: center;
      padding: 25px;
    }

    header h2 {
      margin: 0;
      font-size: 2.2em;
    }

    header p {
      margin: 5px 0 0;
      font-size: 1.1em;
    }

    main {
      max-width: 1100px;
      margin: 40px auto;
      padding: 0 20px;
    }

    h1 {
      color: #5E17EB;
      text-align: center;
      font-size: 2em;
      margin-bottom: 30px;
    }

    .product-grid {
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
      gap: 25px;
    }

    .product-card {
      background: #fff;
      border-radius: 12px;
      border: 1px solid #ddd;
      text-align: center;
      padding: 15px;
      transition: box-shadow 0.3s ease, transform 0.3s ease;
    }

    .product-card:hover {
      box-shadow: 0 8px 20px rgba(94, 23, 235, 0.2);
      transform: translateY(-5px);
    }

    .product-card img {
      width: 100%;
      height: 260px;
      object-fit: cover;
      border-radius: 10px;
      background-color: #f0f0f0;
    }

    .product-card h3 {
      margin: 15px 0 8px;
      font-size: 1.1em;
      color: #333;
    }

    .product-card .price {
      color: #5E17EB;
      font-size: 1.2em;
      font-weight: bold;
      margin: 5px 0 10px;
    }

    .product-card button {
      background: #1DD3B0;
      border: none;
      color: white;
      padding: 12px 20px;
      border-radius: 6px;
      cursor: pointer;
      font-size: 0.95em;
      transition: transform 0.2s;
      font-weight: bold;
    }

    .product-card button:hover {
      transform: scale(1.05);
    }
  </style>
</head>

<body>

  <header>
    <h2>Educart</h2>
    <p>Smart Shopping for Students</p>
  </header>

  <main>
    <h1>Home Appliances Collection</h1>

    <section class="product-grid">
      <?php foreach ($products as $p): ?>
        <div class="product-card">
          <img src="<?= $p['img'] ?>" alt="<?= $p['alt'] ?>">
          <h3><?= $p['name'] ?></h3>
          <p class="price"><?= $p['price'] ?></p>
          <button onclick="alert('Added to cart!')">Add to Cart</button>
        </div>
      <?php endforeach; ?>
    </section>

  </main>

</body>
</html>
