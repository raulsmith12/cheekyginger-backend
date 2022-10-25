<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductPrintSize extends Model
{
    use HasFactory;

    protected $fillable = ['print_size', 'price', 'sku', 'paypal_id'];

    public function print()
    {
        return $this->belongsTo(ProductPrint::class);
    }
}
