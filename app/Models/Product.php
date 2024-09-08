<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'slug',
        'description',
        's_description',
        'feature',
        'image',
        'sub_category_id',
        'brand_id',
        'status',
    ];
    
    public function subCategory()
    {
        return $this->belongsTo(subCategory::class);
    }
    public function brand()
    {
        return $this->belongsTo(brand::class,'brand_id');
    }
    public function sizes()
    {
        return $this->belongsToMany(Size::class,'product_sizes');
    }

    public function productSizes()
    {
        return $this->hasMany(ProductSize::class);
    }
    public function ProductSizeColors()
    {
        return $this->hasMany(ProductSizeColor::class);
    }
}
