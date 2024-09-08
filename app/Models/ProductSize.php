<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductSize extends Model
{
    use HasFactory;
    protected $fillable=[
        'product_id',
        'size_id',
    ];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
    public function size()
    {
        return $this->belongsTo(Size::class,'size_id');
    }

    public function colors()
    {
        return $this->belongsToMany(Color::class);
    }
    public function productSizeColors()
    {
        return $this->hasMany(ProductSizeColor::class);
    }
    
}
