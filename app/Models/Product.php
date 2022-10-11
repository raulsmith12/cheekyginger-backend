<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = ['product_id', 'sku', 'category', 'title', 'description', 'price', 'paypal_id'];

    public function tags()
    {
        return $this->hasMany(ProductTag::class);
    }

    public function pictures()
    {
        return $this->hasMany(ProductPicture::class);
    }
}
