<?php

namespace App\Http\Controllers;

use App\Http\Resources\ProductPrintResource;
use App\Models\ProductPrint;
use Illuminate\Http\Request;

class ProductPrintController extends Controller
{
    public function index ()
    {
        $product_prints = ProductPrint::orderBy('id')->get();
        return ProductPrintResource::collection($product_prints);
    }

    public function show (ProductPrint $product_print)
    {
        return new ProductPrintResource($product_print);
    }

    protected function validateRequest ()
    {
        return request()->validate([
            'print_type' => 'required'
        ]);
    }

    public function store ()
    {
        $data = $this->validateRequest();

        $product_print = ProductPrint::create($data);

        return new ProductPrintResource($product_print);
    }

    public function update (Request $request, ProductPrint $product_print)
    {
        $request()->validate([
            'print_type' => 'required'
        ]);

        $product_print->update($request->all());

        return $product_print;
    }

    public function destroy (ProductPrint $product_print)
    {
        $product_print->delete();

        return response()->noContent();
    }
}
