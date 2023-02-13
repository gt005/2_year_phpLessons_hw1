<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
// Подключи контроллер MainPageController и используй его метод index


Route::get('/', 'App\Http\Controllers\CatalogController@index')->name('index');
Route::get('/category/{category}', 'App\Http\Controllers\CatalogController@category')->name('category');
Route::get('/product/{product:id}', 'App\Http\Controllers\ProductController@index')->name('product');

Auth::routes();

Route::get('/profile', [App\Http\Controllers\HomeController::class, 'index'])->name('profile');
