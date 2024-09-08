<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Customer extends Authenticatable
{
    use HasFactory, Notifiable;
    protected $fillable = [
        'full_name',
        'email',
        'image',
        'phone_number',
        'city',
        'password',
        'status',
        'otp',
        'verified_email',
    ];
    public function getImageUrlAttribute()
    {
        if($this->image=='user_image.png')
        {
            return asset('site/user_image.png');
        }
         return asset('storage/customer/'.$this->image);
    }
    public function carts()
    {
      return $this->hasMany(Cart::class);
    }
}
