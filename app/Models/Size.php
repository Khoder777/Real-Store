<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Size extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
    ];
    public function Products()
    {
        return $this->belongsToMany(Product::class);
    }
    public function productSizes()
    {
        return $this->hasMany(ProductSize::class);
    }
}
