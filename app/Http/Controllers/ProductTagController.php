<?php

namespace App\Http\Controllers;

use App\Http\Resources\ProductTagResource;
use App\Models\Product;
use App\Models\ProductTag;
use Illuminate\Http\Request;

class ProductTagController extends Controller
{
    public function index ()
    {
        $product_tags = ProductTag::orderBy('id')->get();
        return ProductTagResource::collection($product_tags);
    }

    public function show (ProductTag $product_tag)
    {
        return new ProductTagResource($product_tag);
    }

    public function store (Request $request)
    {
        $product = Product::findOrFail($request->product_id);

        $product->tags()->create([
            'tag' => $request->tag
        ]);
    }

    public function update (Request $request, ProductTag $product_tag)
    {
        $request()->validate([
            'tag' => 'required'
        ]);

        $product_tag->update($request->all());

        return $product_tag;
    }

    public function destroy (ProductTag $product_tag)
    {
        $product_tag->delete();

        return response()->noContent();
    }
}
