<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProductGallery;

class ProductGalleryController extends Controller
{
    public function index()
    {
        $productgalleries = ProductGallery::all();
        return view('pages.productgallery.index', compact('productgalleries'));
    }
}
