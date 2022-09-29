<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

use Maatwebsite\Excel\Facades\Excel;
use App\Imports\ProductsImport;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();
        return view('pages.product.index', compact('products'));
    }

//     public function create()
// {
//     return view('pages.product.create');
// }

        public function store(Request $request)
        {
            $this->validate($request, [
                'name'     => 'required',
                'price'     => 'required',
                'stock'     => 'required',
                'buy'     => 'required',
                'sell'     => 'required',
                'status'     => 'required',
                'description'     => 'required',
            ]);

            $product = Product::create([
                'name'     => $request->name,
                'price'    => $request->price,
                'stock'     => $request->stock,
                'buy'     => $request->buy,
                'sell'     => $request->sell,
                'status'     => $request->status,
                'description'     => $request->description,
            ]);

            if($product){
                //redirect dengan pesan sukses
                alert()->success('Horee!','Data Berhasil Di Tambahkan!.');
                return redirect()->route('product.index')->with(['success' => 'Data Berhasil Disimpan!']);
            }else{
                //redirect dengan pesan error
                alert()->error('Sorry','Data Tidak Berhasil Di Tambahkan!.');
                return redirect()->route('product.index')->with(['error' => 'Data Gagal Disimpan!']);
            }
        }

            public function exportTemplate()
        {

            return Excel::download(new ExportTemplateDataSales, 'data-sales ' . now() . '.xlsx');
        }


        public function import()
        {
            Excel::import(new ProductsImport, request()->file('Product'. now()));
            return view('pages.product.index');
        }

        public function edit(Product $product)
        {
            return view('pages.product.edit', compact('product'));
        }

        public function show(Product $product){
            return view('pages.product.detail', compact('product'));
        }
        public function update(Request $request, Product $product)
        {
            $this->validate($request, [
                'name'     => 'required',
                'price'     => 'required',
                'stock'     => 'required',
                'buy'     => 'required',
                'sell'     => 'required',
                'status'     => 'required',
                'description'     => 'required',
            ]);

            //get data Blog by ID
            $product = Product::findOrFail($product->id);

                $product->update([
                    'name'     => $request->name,
                    'price'    => $request->price,
                    'stock'     => $request->stock,
                    'buy'     => $request->buy,
                    'sell'     => $request->sell,
                    'status'     => $request->status,
                    'description'     => $request->description,
                ]);

                if($product){
                    //redirect dengan pesan sukses
                    alert()->success('Horee!','Data Berhasil Di Edit!.');
                    return redirect()->route('product.index')->with(['success' => 'Data Berhasil Disimpan!']);
                }else{
                    //redirect dengan pesan error
                    alert()->error('Sorry','Data Tidak Berhasil Di Edit!.');
                    return redirect()->route('product.index')->with(['error' => 'Data Gagal Disimpan!']);
                }
        }

        public function destroy($id)
        {
        $product = Product::findOrFail($id);
        $product->delete();

        if($product){
            //redirect dengan pesan sukses
            alert()->success('Horee!','Data Berhasil Di Hapus!.');
            return redirect()->route('product.index')->with(['success' => 'Data Berhasil Disimpan!']);
        }else{
            //redirect dengan pesan error
            alert()->error('Sorry','Data Tidak Berhasil Di Hapus!.');
            return redirect()->route('product.index')->with(['error' => 'Data Gagal Disimpan!']);
        }

    }




}
