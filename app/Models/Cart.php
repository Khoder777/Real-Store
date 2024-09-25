<?php

namespace App\Models;

use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Database\Query\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Cart extends Model
{
    use HasFactory;

    public $incrementing=false;
    public $autoincrement=false;
    protected $fillable = [
        'customer_id',
        'product_size_color_id',
        'quantity',
        'unit_price'
    ];

    protected static function booted()
    {
        static::creating(function ($model) {
            $model->id = Str::uuid();
            });

        static::addGlobalScope(function(Builder $builder){
            $builder->where('customer_id', Auth::guard('customers')->id());

        });
            
    }
    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }
    public function product_size_color()
    {
        return $this->belongsTo(ProductSizeColor::class);
    }
    
}
