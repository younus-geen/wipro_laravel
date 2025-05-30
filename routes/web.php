<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactUSController;
use App\Models\ContactUs;
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



Route::get('/', function () {
    return view('welcome');
});


Route::get('/home', function () {

    return view('home');
});

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
