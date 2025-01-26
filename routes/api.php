<?php

use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

/*
Description: perform all the crude of the product here
*/



Route::get('/products',[ProductController::class,'index'])->name('product.index');







