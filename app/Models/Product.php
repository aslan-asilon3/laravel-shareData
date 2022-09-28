<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable = [

        'name', 
        'price',
        'stock',
        'buy',
        'sell',
        'status',
        'description',

    ];

    public function productgallery()
    {
        return $this->hasOne(App\Models\ProductGallery::class);
    }

}
