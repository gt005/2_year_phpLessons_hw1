<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\SubCategory;
use Illuminate\Http\Request;
use function GuzzleHttp\Promise\all;

class CatalogController extends Controller
{
    public function index()
    {
        $user = auth()->user();

        $raw_cart_items = [];
        foreach (\Cart::session($user->id)->getContent() as $item) {
            $raw_cart_items[] = $item->id;
        }

        $categories = Category::all();
        $products = Product::all();

        return view('catalog.index', compact('categories', 'products', 'raw_cart_items'));
    }

    public function category($activeCategory = null)
    {
        $user = auth()->user();

        $raw_cart_items = [];
        foreach (\Cart::session($user->id)->getContent() as $item) {
            $raw_cart_items[] = $item->id;
        }

        $activeCategory = Category::where('name', $activeCategory)->first();

        if (!$activeCategory) {
            abort(404);
        }

        $products = Product::where('category_id', $activeCategory->id)->get();
        $categories = SubCategory::where('category_id', $activeCategory->id)->get();

        return view('catalog.category', compact('categories', 'products', 'activeCategory', 'raw_cart_items'));
    }
}
