<?php

namespace App\Http\Controllers;

use App\Models\Products;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class AdminControllers extends Controller
{
    public function index(){
        return view('admin.index');
    }

    public function products(){
        $data['products'] = Products::All();
        return view('admin.products', $data);
    }
    
    public function activate(Request $request, $id)
{
    Log::info('Toggle masuk', [
        'id' => $id,
        'status_dikirim' => $request->status,
    ]);

    $product = Products::findOrFail($id);

    $product->activate = ($request->status === true || $request->status === "true")
        ? 'activate'
        : 'inactivate';

    $product->save();

    Log::info('Status baru', [
        'id' => $product->id,
        'status' => $product->activate,
    ]);

    return response()->json(['success' => true, 'status' => $product->activate]);
}


}
