<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use Illuminate\Http\Request;
use Darryldecode\Cart\Cart;
use Illuminate\Validation\Validator;

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
        $cart_total = \Cart::session($user->id)->getTotal();

        return view('cart', compact('cart_items', 'cart_total'));
    }

    public function addToCart(Request $request)
    {
        $user = auth()->user();

        $request->validate([
            'id' => 'required|integer',
            'name' => 'required|string',
            'price' => 'required|integer',
            'quantity' => 'required|integer',
        ]);

        \Cart::session($user->id)->add(array(
            'id' => $request->id,
            'name' => $request->name,
            'price' => $request->price,
            'quantity' => $request->quantity,
        ));

        return redirect()->route('cart_page');
    }

    public function removeFromCart(Request $request)
    {
        $user = auth()->user();

        \Cart::session($user->id)->remove($request->id);

        return redirect()->route('cart_page');
    }

    public function changeProductAmount(Request $request)
    {
        $user = auth()->user();

        $request->validate([
            'id' => 'required|integer',
            'quantity' => 'required|integer',
        ]);

        \Cart::session($user->id)->get($request->id)->quantity = $request->quantity;

        return redirect()->route('cart_page');
    }

    public function submitOrder(Request $request)
    {
        $user = auth()->user();

        if (\Cart::session($user->id)->isEmpty()) {
            return redirect()->route('cart_page');
        }

        $new_order = Order::create([
            'user_id' => $user->id,
            'order_date' => now(),
            'order_number' => Order::getLastOrderNumber() + 1,
        ]);


        foreach (\Cart::session($user->id)->getContent() as $item) {
            // todo: Сделать валидацию
//            $request->validate([
//                'product_name' => 'required|string',
//                'order_id' => 'required|integer',
//                'product_id' => 'required|integer',
//                'product_price' => 'required|integer',
//                'amount' => 'required|integer',
//            ]);

            OrderItem::create([
                'product_name' => $item->name,
                'order_id' => $new_order->id,
                'product_id' => $item->id,
                'product_price' => $item->price,
                'amount' => $item->quantity
            ]);
        }

        \Cart::session($user->id)->clear();

        return redirect()->route('profile');
    }
}
