<?php

use App\Http\Controllers\ProductController;
use App\Mail\newProductAvailableEmail;
use App\Models\Product;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;

Route::get('/products',[ProductController::class,'index'])->name('product.index');
Route::post('/product/create',[ProductController::class,'store'])->name('product.create');


