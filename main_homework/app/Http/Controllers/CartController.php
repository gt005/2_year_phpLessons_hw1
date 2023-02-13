<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Darryldecode\Cart\Cart;

class CartController extends Controller
{
    public function index()
    {
        $user = auth()->user();

        $cart_items = [];

        \Cart::session($user->id)->getContent()->each(function($item) use (&$cart_items)
        {
            $cart_items[] = [
                'object' => Product::where('id', $item->id)->first(),
                'cart_item' => $item
            ];
        });

        return view('cart', compact('cart_items', 'cart_items'));
    }

    public function addToCart(Request $request)
    {
        $user = auth()->user();

        \Cart::session($user->id)->add(array(
            'id' => $request->id,
            'name' => $request->name,
            'price' => $request->price,
            'quantity' => $request->quantity,
        ));

        return redirect()->route('cart_page');
    }
}
