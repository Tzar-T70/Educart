<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class BasketController extends Controller
{
    public function index()
    {
        // Dummy data (replace later with DB)
        $basket = session()->get('basket', [
            1 => [
                'name' => 'Maths Textbook',
                'price' => 12.99,
                'quantity' => 1,
                'image' => '/images/products/book1.jpg',
            ],
            2 => [
                'name' => 'Science Workbook',
                'price' => 8.49,
                'quantity' => 2,
                'image' => '/images/products/book2.jpg',
            ],
            3 => [
                'name' => 'Laptop Bag',
                'price' => 24.00,
                'quantity' => 1,
                'image' => '/images/products/bag1.jpg',
            ],
        ]);

        session()->put('basket', $basket);

        // Subtotal
        $subtotal = collect($basket)->sum(fn($item) => $item['price'] * $item['quantity']);

        return view('payments.BasketPage', compact('basket', 'subtotal'));
    }

    public function updateQuantity(Request $request, $id)
    {
        $basket = session()->get('basket');

        if (isset($basket[$id])) {
            $basket[$id]['quantity'] = max(1, (int) $request->quantity);
            session()->put('basket', $basket);
        }

        return back();
    }

    public function remove($id)
    {
        $basket = session()->get('basket');

        if (isset($basket[$id])) {
            unset($basket[$id]);
            session()->put('basket', $basket);
        }

        return back();
    }


    public function add(Request $request, Product $product)
    {
        $basket = session()->get('basket', []);

        if (isset($basket[$product->id])) {
            $basket[$product->id]['quantity']++;
        } else {
            $basket[$product->id] = [
                'name' => $product->name,
                'price' => $product->price,
                'quantity' => 1
            ];
        }

        session()->put('basket', $basket);

        return back()->with('success', 'Item added to basket!');
    }

    public function update(Request $request, Product $product)
    {
        $basket = session()->get('basket', []);

        if (isset($basket[$product->id])) {
            $basket[$product->id]['quantity'] = $request->quantity;
            session()->put('basket', $basket);
        }

        return back();
    }

    
}
