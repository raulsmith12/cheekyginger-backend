<?php

namespace App\Http\Controllers;

use App\Http\Resources\ProductResource;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index ()
    {
        $products = Product::orderBy('id')->get();
        return ProductResource::collection($products);
    }

    public function show (Product $product)
    {
        return new ProductResource($product);
    }

    protected function validateRequest ()
    {
        return request()->validate([
            'category' => 'required',
            'title' => 'required',
            'description' => 'required'
        ]);
    }

    public function store ()
    {
        $data = $this->validateRequest();

        $product = Product::create($data);

        return new ProductResource($product);
    }

    public function update (Request $request, Product $product)
    {
        $request()->validate([
            'category' => 'required',
            'title' => 'required',
            'description' => 'required'
        ]);

        $product->update($request->all());

        return $product;
    }

    public function destroy (Product $product)
    {
        $product->delete();

        return response()->noContent();
    }
}
