<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductPrint extends Model
{
    use HasFactory;

    protected $fillable = ['print_type'];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function sizes()
    {
        return $this->hasMany(ProductPrintSize::class);
    }
}
