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
        "price"=>$request->price,
        'inventory'=>$request->inventory
    ];


    Product::create($product);

    $product = Product::first();

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
