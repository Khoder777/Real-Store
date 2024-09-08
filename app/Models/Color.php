<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Color extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'color',
    ];
    public function productSizes()
    {
        return $this->belongsToMany(ProductSize::class);
    }
    public function productSizeColors()
    {
        return $this->hasMany(ProductSizeColor::class);
    }
}
