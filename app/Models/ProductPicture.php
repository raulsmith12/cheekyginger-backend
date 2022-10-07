<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductPicture extends Model
{
    use HasFactory;

    protected $fillable = ['url'];

    public function product()
    {
        $this->belongsTo(Product::class);
    }
}