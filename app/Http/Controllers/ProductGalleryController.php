<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProductGallery;
use App\Models\Product;

class ProductGalleryController extends Controller
{
    public function index()
    {
        $products = Product::all();
        // $products = Product::distinct()->orderBy('id','asc')->get('id');
        $productgalleries = ProductGallery::all();
        return view('pages.productgallery.index', compact('productgalleries','products'));
    }

    // public function create()
    // {
    //     return view('blog.create');
    // }

    public function store(Request $request)
    {
        $this->validate($request, [
            'product_id'     => 'required',
            'image'     => 'required|image|mimes:png,jpg,jpeg',
        ]);

        //upload image
        $image = $request->file('image');
        $image->storeAs('public/productgalleries', $image->hashName());

        $productgallery = ProductGallery::create([
            'product_id'     => $request->product_id,
            'image'          => $image->hashName(),
        ]);

        if($productgallery){
            //redirect dengan pesan sukses
            alert()->success('Horee!','Data Berhasil Di Edit!.'); 
            return redirect()->route('productgallery.index')->with(['success' => 'Data Berhasil Disimpan!']);
        }else{
            //redirect dengan pesan error
            alert()->error('Sorry','Data Tidak Berhasil Di Edit!.');
            return redirect()->route('productgallery.index')->with(['error' => 'Data Gagal Disimpan!']);
        }
    }


}
