<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable = [

        'name',
        'heading',
        'color',
        'size'  ,
        'price'  ,
        'stock'   ,
        'buy'      ,
        'sell'      ,
        'batch'      ,
        'status'      ,
        'description'  ,
        'comment'    ,
        'rating'    ,

    ];

    public function productgalleries()
    {
        return $this->hasMany(ProductGallery::class);
    }

}
