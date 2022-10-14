<?php

namespace App\Http\Controllers;

use App\Http\Resources\ProductPictureResource;
use App\Models\ProductPicture;
use Illuminate\Http\Request;

class ProductPictureController extends Controller
{
    public function index ()
    {
        $product_pictures = ProductPicture::orderBy('id')->get();
        return ProductPictureResource::collection($product_pictures);
    }

    public function show (ProductPicture $product_picture)
    {
        return new ProductPictureResource($product_picture);
    }

    protected function validateRequest ()
    {
        return request()->validate([
            'url' => 'required'
        ]);
    }

    public function store ()
    {
        $data = $this->validateRequest();

        $product_picture = ProductPicture::create($data);

        return new ProductPictureResource($product_picture);
    }

    public function update (Request $request, ProductPicture $product_picture)
    {
        $request()->validate([
            'url' => 'required'
        ]);

        $product_picture->update($request->all());

        return $product_picture;
    }

    public function destroy (ProductPicture $product_picture)
    {
        $product_picture->delete();

        return response()->noContent();
    }
}
