<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\Store;
use App\Models\User;
use Illuminate\Contracts\Encryption\DecryptException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;

class AdminController extends Controller
{
    
    public function decrypId($id){
        try {
            return Crypt::decrypt($id);
        } catch (DecryptException $e) {
            abort(404);
        }
    }

    public function Dashboard(){
        $data['user'] = User::all();
        $data['store'] = Store::all();
        $data['produk'] = Product::all();
        return view('Administrator.dashboard', $data);
    }
    
    public function Beranda(){
        $data['products'] = Product::with(['imageProducts', 'store'])->latest()->get();
        $data['stores'] = Store::all();
        $data['users'] = User::all();
        return view('beranda', $data);
    }

    public function User($id = null){
        if ($id) {
            $id = $this->decrypId($id);
            $data['users'] = User::findOrFail($id);
        }
        $data['users'] = User::all();
        return view('Administrator.user', $data);
    }

    public function Toko($id = null){
        if ($id) {
            $id = $this->decrypId($id);
            $data['stores'] = Store::findOrFail($id);
        }
        $data['stores'] = Store::all();
        $data['user'] = User::all();
        return view('Administrator.toko', $data);
    }

    public function Kategori($id = null){
        if ($id) {
            $id = $this->decrypId($id);
            $data['kategori'] = Category::findOrFail($id);
        }
        $data['kategori'] = Category::all();
        return view('Administrator.kategori', $data);
    }

}
