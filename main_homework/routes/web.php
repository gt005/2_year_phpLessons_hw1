<?php

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
//Route::get('/', 'MainPageController')->name('index');

Route::get('/', 'App\Http\Controllers\MainPageController@index')->name('index.show');
