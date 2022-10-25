<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = ['category', 'title', 'description'];

    public function tags()
    {
        return $this->hasMany(ProductTag::class);
    }

    public function pictures()
    {
        return $this->hasMany(ProductPicture::class);
    }

    public function prints()
    {
        return $this->hasMany(ProductPrint::class);
    }
}
