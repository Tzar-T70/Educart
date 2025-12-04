<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cart;
use App\Models\CartItem;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function index()
    {
        $carts = Cart::with(['user', 'items.product'])->get();
        return response()->json($carts);
    }

    public function show($id)
    {
        $cart = Cart::with(['items.product'])->findOrFail($id);
        return response()->json($cart);
    }

    public function createCart($user_id)
    {
        $cart = Cart::firstOrCreate(['user_id' => $user_id]);
        return response()->json($cart);
    }

    public function addItem(Request $request)
    {
        $request->validate([
            'user_id' => 'required|integer|exists:users,user_id',
            'product_id' => 'required|integer|exists:products,product_id',
            'quantity' => 'required|integer|min:1'
        ]);

        $cart = Cart::firstOrCreate(['user_id' => $request->user_id]);

        $product = Product::findOrFail($request->product_id);

        $item = CartItem::where('cart_id', $cart->cart_id)
                        ->where('product_id', $product->product_id)
                        ->first();

        if ($item) {
            $item->quantity += $request->quantity;
            $item->subtotal = $item->quantity * $product->price;
            $item->save();
        } else {
            CartItem::create([
                'cart_id' => $cart->cart_id,
                'product_id' => $product->product_id,
                'quantity' => $request->quantity,
                'price' => $product->price,
                'subtotal' => $product->price * $request->quantity,
            ]);
        }

        $cart->total = CartItem::where('cart_id', $cart->cart_id)->sum('subtotal');
        $cart->save();

        return response()->json(['message' => 'Item added to cart successfully', 'cart' => $cart->load('items.product')]);
    }


    public function updateItem(Request $request, $cart_item_id)
    {
        $request->validate([
            'quantity' => 'required|integer|min:1'
        ]);

        $item = CartItem::findOrFail($cart_item_id);
        $product = Product::findOrFail($item->product_id);

        $item->quantity = $request->quantity;
        $item->subtotal = $product->price * $request->quantity;
        $item->save();

        $cart = Cart::findOrFail($item->cart_id);
        $cart->total = CartItem::where('cart_id', $cart->cart_id)->sum('subtotal');
        $cart->save();

        return response()->json(['message' => 'Cart item updated successfully', 'cart' => $cart->load('items.product')]);
    }


    public function removeItem($cart_item_id)
    {
        $item = CartItem::findOrFail($cart_item_id);
        $cart = Cart::findOrFail($item->cart_id);

        $item->delete();

        $cart->total = CartItem::where('cart_id', $cart->cart_id)->sum('subtotal');
        $cart->save();

        return response()->json(['message' => 'Item removed from cart', 'cart' => $cart->load('items.product')]);
    }

    public function clearCart($user_id)
    {
        $cart = Cart::where('user_id', $user_id)->first();

        if (!$cart) {
            return response()->json(['message' => 'Cart not found']);
        }

        CartItem::where('cart_id', $cart->cart_id)->delete();
        $cart->total = 0;
        $cart->save();

        return response()->json(['message' => 'Cart cleared successfully']);
    }
}
