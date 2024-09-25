<?php

namespace App\Models;

use NumberFormatter;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ProductSizeColor extends Model
{
    use HasFactory;
    protected $fillable=[
        'productsize_id',
        'color_id',
        'product_id',
        'price',
        'offer',
        'quantity',
    ];
    public function getCurrencyPriceAttribute()
    {
        $fmt = new NumberFormatter( 'en', NumberFormatter::CURRENCY );
        
        return $fmt->formatCurrency($this->price, config('app.currency'));
    }
    public function getCurrencyOfferAttribute()
    {
        $fmt = new NumberFormatter( 'en', NumberFormatter::CURRENCY );
        
        return $fmt->formatCurrency($this->offer, config('app.currency'));
    }
    public function color()
    {
        return $this->belongsTo(Color::class);
    }
    public function productSize()
    {
        return $this->belongsTo(ProductSize::class,'productsize_id');
    }
    public function product()
    {
        return $this->belongsTo(Product::class);
        }

    public function carts()
    {
      return $this->hasMany(Cart::class);
    }

    public function orderItems()
    {
      return $this->hasMany(Cart::class,'product_size_colors_id');
    }
}
