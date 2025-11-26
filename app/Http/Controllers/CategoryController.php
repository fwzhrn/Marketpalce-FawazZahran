<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Contracts\Encryption\DecryptException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;

class CategoryController extends Controller
{
    public function decrypId($id){
        try {
            return Crypt::decrypt($id);
        } catch (DecryptException $e) {
            abort(404);
        }
    }

    public function Store(Request $request)
    {
        $validate = $request->validate([
            'nama_kategori' => 'required|string|max:255|unique:categories,nama_kategori',
        ]);
        Category::create($validate);
        return redirect()->route('kategori.admin')->with('pesan', 'Kategori berhasil dibuat.');
    }

    public function Update(Request $request, String $id)
    {
        $id = $this->decrypId($id);
        $kategori = Category::findOrFail($id);

        $validate = $request->validate([
            'nama_kategori' => 'required|string|max:255|unique:categories,nama_kategori,' . $kategori->id,
        ]);

        $kategori->update($validate);
        return redirect()->route('kategori.admin')->with('pesan', 'Kategori berhasil diperbarui.');
    }

    
    public function Delete(String $id){
        $id = $this->decrypId($id);
        $kategori = Category::findOrFail($id);
        $kategori->delete();
        return redirect()->back()->with('pesan', 'kategori berhasil dihapus.');
    }
}
