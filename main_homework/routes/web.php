<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
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
Route::get('/search/', 'App\Http\Controllers\CatalogController@search')->name('search');


Route::group(['middleware' => ['auth']], function() {
    Route::get('/cart', 'App\Http\Controllers\CartController@index')->name('cart_page');
    Route::get('/profile', 'App\Http\Controllers\HomeController@index')->name('profile');

    Route::post('/add_to_cart', 'App\Http\Controllers\CartController@addToCart')->name('add_to_cart');
    Route::post('/remove_from_cart', 'App\Http\Controllers\CartController@removeFromCart')->name('remove_from_cart');
    Route::post('/change_amount_in_cart', 'App\Http\Controllers\CartController@changeProductAmount')->name('change_amount_in_cart');
    Route::post('/change_amount_in_cart', 'App\Http\Controllers\CartController@changeProductAmount')->name('change_amount_in_cart');
    Route::post('/submit_order', 'App\Http\Controllers\CartController@submitOrder')->name('submit_order');
});


Auth::routes();

Route::group(['middleware' => ['role:Admin']], function() {
    Route::resource('users', UserController::class);
    Route::get('/admin_order_list', 'App\Http\Controllers\OrderListController@index')->name('order_list');
});

