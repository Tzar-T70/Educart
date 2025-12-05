<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Cart;
use App\Models\CartItem;
use Illuminate\Support\Facades\Auth;

class BasketController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        if (!$user) {
            return redirect()->route('login');
        }

        $cart = Cart::with('items.product')->firstOrCreate(['user_id' => $user->id]);
        
        // Calculate subtotal
        $subtotal = $cart->items->sum(function($item) {
            return $item->price * $item->quantity;
        });

        // Update cart total
        $cart->total = $subtotal;
        $cart->save();

        return view('payments.BasketPage', compact('cart', 'subtotal'));
    }

    public function updateQuantity(Request $request, $id)
    {
        $request->validate([
            'quantity' => 'required|integer|min:1'
        ]);

        $item = CartItem::findOrFail($id);
        
        // Ensure user owns this cart item
        if ($item->cart->user_id !== Auth::id()) {
            abort(403);
        }

        $item->quantity = $request->quantity;
        $item->subtotal = $item->price * $request->quantity;
        $item->save();

        // Update cart total
        $this->updateCartTotal($item->cart);

        return back()->with('success', 'Cart updated!');
    }

    public function remove($id)
    {
        $item = CartItem::findOrFail($id);

        // Ensure user owns this cart item
        if ($item->cart->user_id !== Auth::id()) {
            abort(403);
        }

        $cart = $item->cart;
        $item->delete();

        // Update cart total
        $this->updateCartTotal($cart);

        return back()->with('success', 'Item removed from basket!');
    }

    public function add(Request $request)
    {
        \Illuminate\Support\Facades\Log::info('BasketController@add called', $request->all());

        $request->validate([
            'product_id' => 'required|exists:products,id',
            'quantity' => 'required|integer|min:1'
        ]);

        $user = Auth::user();
        if (!$user) {
            \Illuminate\Support\Facades\Log::info('User not logged in, redirecting to login');
            return redirect()->route('login');
        }

        \Illuminate\Support\Facades\Log::info('User logged in: ' . $user->id);

        $product = Product::findOrFail($request->product_id);
        $cart = Cart::firstOrCreate(['user_id' => $user->id]);

        \Illuminate\Support\Facades\Log::info('Cart found/created: ' . $cart->cart_id);

        $item = CartItem::where('cart_id', $cart->cart_id)
                        ->where('product_id', $product->id)
                        ->first();

        if ($item) {
            \Illuminate\Support\Facades\Log::info('Updating existing item: ' . $item->cart_item_id);
            $item->quantity += $request->quantity;
            $item->subtotal = $item->quantity * $item->price;
            $item->save();
        } else {
            \Illuminate\Support\Facades\Log::info('Creating new item');
            CartItem::create([
                'cart_id' => $cart->cart_id,
                'product_id' => $product->id,
                'quantity' => $request->quantity,
                'price' => $product->price,
                'subtotal' => $product->price * $request->quantity,
            ]);
        }

        $this->updateCartTotal($cart);

        \Illuminate\Support\Facades\Log::info('Item added, redirecting back');
        return back()->with('success', 'Item added to basket!');
    }

    private function updateCartTotal(Cart $cart)
    {
        $cart->total = $cart->items()->sum('subtotal');
        $cart->save();
    }
}
