<?php

use App\Models\Product;
use App\Models\Varchar;
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

Route::get('/', function () {
    $products = Product::paginate(25);
    $varchar = Varchar::paginate(25)->where('value', 'North Felix');

    return view('welcome', compact('products', 'varchar'));
});