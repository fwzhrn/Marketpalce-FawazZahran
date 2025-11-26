<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Store;
use App\Models\User;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    public function index()
    {
        $data['user'] = User::all();
        $data['store'] = Store::all();
        $data['produk'] = Product::all();
        return view('about', $data);
    }
}
