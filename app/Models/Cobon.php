<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cobon extends Model
{
    use HasFactory;
    protected $fillable = [
        'code',
        'amount',
        'status',
        'uses',
        'start_date',
        'end_date',
    ];
}
