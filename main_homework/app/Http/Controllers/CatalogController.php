<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\SubCategory;
use Illuminate\Http\Request;

class CatalogController extends Controller
{
    public function index($activeCategory = null)
    {

        // Получить категорию по имени из адресной строки из базы данных Category. Если такой категории нет, то вернуть 404 ошибку

        if ($activeCategory) {
            $activeCategory = Category::where('name', $activeCategory)->first();
            if (!$activeCategory) {
                abort(404);
            }

            $products = Product::where('category_id', $activeCategory->id)->get();
            $categories = SubCategory::where('category_id', $activeCategory->id)->get();

            return view('catalog_page', compact('categories', 'products', 'activeCategory'));
        }
        $categories = Category::all();
        $products = Product::all();

        return view('catalog_page', compact('categories', 'products', 'activeCategory'));
    }
}
