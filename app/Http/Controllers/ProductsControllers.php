<?php

namespace App\Http\Controllers;

use App\Models\Products;
// use Illuminate\Container\Attributes\Storage;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;

class ProductsControllers extends Controller
{
    public function index()
    {
        $data['products'] = Products::where('activate', 'activate')->get();
        return view('products.index', $data);
    }

    public function view(Request $request)
    {
        $data['viewdetail'] = Products::where('id', $request->id)->first();
        $data['products'] = Products::All();

        return view('products.viewdetail', $data);
    }

    public function create(Request $request)
    {
        $products = Products::latest()->first();
        $code_product = "PULLO";
        $kode_tahun = date('Y');
        $kode_bulan = date('m');
        $kode_hari = date('d');
        if ($products == null) {
            $no_kode = '0001';
        } else {
            $explode = explode("/", $products->code_product);
            $no_kode = intval($explode[4] + 1);
            $no_kode = str_pad($no_kode, 4, '0', STR_PAD_LEFT);
        }
        $code = "$code_product/$kode_tahun/$kode_bulan/$kode_hari/$no_kode";
        $request->validate([
            'name_product' => 'required',
            'process' => 'required',
            'image_product' => 'required',
            'category' => 'required',
            'price' => 'required',
            'stok' => 'required',
        ]);

        Products::create([
            'code_product' => $code,
            'name_product' => $request->name_product,
            'process' => $request->process,
            'image_product' => $request->file('image_product')->store('product-images'),
            'category' => $request->category,
            'price' => $request->price,
            'stok' => $request->stok,
            'notes' => $request->notes
        ]);
        return redirect('products');
    }

    public function delete($id)
    {
        $product = Products::findOrFail($id);
        $product->delete();

        return redirect('products')->with('success', 'Produk berhasil dihapus.');
    }
}
