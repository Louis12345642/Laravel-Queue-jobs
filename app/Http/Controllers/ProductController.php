<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Jobs\productCreatedJob;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::all();

        return response()->json($products);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
    $product = [
        "name"=>$request->name,
        "price"=>$request->price
    ];


    Product::created($product);

    //dispatch a queue that put the email to
    $name ="mubarak Louis";
    $product = Product::first();
    $user = [
        "name"=>"mubarak louis",
        "email"=>"mubaraklouis@gmail.com"
    ];

    //dispatch the job for creating the product

    productCreatedJob::dispatch($product);



      return response()->json([
        "messages"=>"product created successfully"
      ]);
}

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProductRequest $request, Product $product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        //
    }
}
