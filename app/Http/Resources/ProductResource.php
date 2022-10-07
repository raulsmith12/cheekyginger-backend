<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ProductResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'product_id' => $this->product_id,
            'sku' => $this->sku,
            'category' => $this->category,
            'title' => $this->title,
            'description' => $this->description,
            'price' => $this->price,
            'paypal_id' => $this->paypal_id,
            'pictures' => ProductPictureResource::collection($this->pictures),
            'tags' => ProductTagResource::collection($this->tags)
        ];
    }
}
