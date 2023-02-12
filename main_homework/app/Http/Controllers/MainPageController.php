<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class MainPageController extends Controller
{
    public function index()
    {
        // Получить 50 категорий модели Category
        $categories = Category::query()->limit(50)->get();

        return view('index', compact('categories'));
    }
}
