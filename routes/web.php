<?php

use App\Http\Controllers\ProductController;
use App\Mail\newProductAvailableEmail;
use App\Models\Product;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;
Route::get('/products',[ProductController::class,'index'])->name('product.index');

Route::post('/product/create',[ProductController::class,'store'])->name('product.create');


//email test sending

Route::get('/send-mail',function(){
    $name ="mubarak Louis";
    $product = Product::find(1);
    $user = [
        "name"=>"mubarak louis",
        "email"=>"mubaraklouis@gmail.com"
    ];

    Mail::to('kual62319@gmail.com',$name)->queue(new newProductAvailableEmail($product,$user));
});

