<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderItems extends Model
{
    use HasFactory;

    protected $fillable = [
        'order_id',
        'product_size_colors_id',
        'quantity',
        'unit_price',
    ];

    public function productSizeColors()
    {
        return $this->belongsTo(ProductSizeColor::class,'product_size_colors_id');
    }
    public function orders()
    {
        return $this->belongsTo(Order::class,'order_id');
    }
    
}
