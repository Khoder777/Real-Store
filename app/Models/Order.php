<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'customer_id',
        'reciver_name',
        'reciver_city',
        'reciver_phone_number',
        'reciver_address',
        'order_status',
        'reciver_town',
        'total_price',
        'cobon_id',
    ];

    public function customers()
    {
        return $this->belongsTo(Customer::class,'customer_id');
    }
    public function orderItems()
    {
        return $this->hasMany(OrderItems::class,'order_id');
    }
}
