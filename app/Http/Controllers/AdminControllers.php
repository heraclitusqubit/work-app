<?php

namespace App\Http\Controllers;

use App\Models\Products;
use Illuminate\Http\Request;

class AdminControllers extends Controller
{
    public function index(){
        return view('admin.index', $data);
    }

    public function products(){
        $data['products'] = Products::All();
        return view('admin.products', $data);
    }

}
