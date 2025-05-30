<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactUSController;
use App\Models\ContactUs;
use App\Http\Controllers\ProductController;
use App\Models\Products;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great on web !
|
*/
Route::get('/contact', [ContactUSController::class, 'index'])->name('contact.index');   
Route::post('/contact', [ContactUSController::class, 'store'])->name('contact.store');

Route::get('/add_product', [ProductController::class, 'index'])->name('product.index');   
Route::post('/add_product', [ProductController::class, 'store'])->name('product.store');

Route::get('/', function () {
    return view('welcome');
});

Route::get('/home', [ProductController::class, 'display'])->name('product.display');   

Route::get('/about', function () {

    return view('about');
});
Route::get('/blog-single', function () {

    return view('/blog-single');
});
Route::get('/blog', function () {

    return view('/blog');
});


Route::get('/services', function () {

    return view('services');
});
Route::get('/menu', function () {

    return view('menu');
});
Route::get('/index', function () {

    return view('index');
});
