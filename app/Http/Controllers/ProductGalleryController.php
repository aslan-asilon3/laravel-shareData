<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProductGallery;
use App\Models\Product;
use Illuminate\Support\Facades\Storage;

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
            return redirect()->route('productgallery.index');
        }else{
            //redirect dengan pesan error
            alert()->error('Sorry','Data Tidak Berhasil Di Edit!.');
            return redirect()->route('productgallery.index');
        }
    }


        public function destroy($id)
    {
    $productgallery = ProductGallery::findOrFail($id);
    Storage::disk('local')->delete('public/productgalleries/'.$productgallery->image);
    $productgallery->delete();

    if($productgallery){
        //redirect dengan pesan sukses
        alert()->success('Horee!','Data Berhasil Di Hapus!.'); 
        return redirect()->route('productgallery.index');
    }else{
        //redirect dengan pesan error
        alert()->error('Sorry','Data Tidak Berhasil Di Hapus!.');
        return redirect()->route('productgallery.index');
    }
    }



}
