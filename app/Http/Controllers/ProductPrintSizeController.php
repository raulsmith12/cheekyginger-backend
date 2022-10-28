<?php

namespace App\Http\Controllers;

use App\Http\Resources\ProductPrintSizeResource;
use App\Models\ProductPrint;
use App\Models\ProductPrintSize;
use Illuminate\Http\Request;

class ProductPrintSizeController extends Controller
{
    public function index ()
    {
        $product_print_sizes = ProductPrintSize::orderBy('id')->get();
        return ProductPrintSizeResource::collection($product_print_sizes);
    }

    public function show (ProductPrintSize $product_print_size)
    {
        return new ProductPrintSizeResource($product_print_size);
    }

    public function store (Request $request)
    {
        $product = ProductPrint::findOrFail($request->print_id);

        $product->tags()->create([
            'print_size' => $request->print_size,
            'price' => $request->price,
            'sku' => $request->sku,
            'paypal_id' => $request->paypal_id
        ]);
    }

    public function update (Request $request, ProductPrintSize $product_print_size)
    {
        $request()->validate([
            'print_size' => 'required',
            'price' => 'required',
            'sku' => 'required'
        ]);

        $product_print_size->update($request->all());

        return $product_print_size;
    }

    public function destroy (ProductPrintSize $product_print_size)
    {
        $product_print_size->delete();

        return response()->noContent();
    }
}
