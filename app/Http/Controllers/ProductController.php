<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\ImageProduct;
use App\Models\Product;
use App\Models\Store;
use Illuminate\Contracts\Encryption\DecryptException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Storage;

use function Symfony\Component\Clock\now;

class ProductController extends Controller
{
    public function decrypId($id){
        try {
            return Crypt::decrypt($id);
        } catch (DecryptException $e) {
            abort(404);
        }
    }

    public function Index(){
        $data['category'] = Category::with(['products.imageProducts'])->get();
        return view('produk', $data);
    }

    public function Create()
    {
        $data['categories'] = Category::all();
        $data['store'] = Store::where('users_id', Auth::id())->first();
        if (!$data['store']) {
            return redirect()->back()->with('error', 'Anda belum memiliki toko.');
        }
        return view('Member.Produk.produk-create', $data);
    }

    public function store(Request $request)
    {
        $request->validate([
            'categories_id' => 'required|exists:categories,id',
            'stores_id' => 'required|exists:stores,id',
            'nama_produk' => 'required|string|max:100',
            'harga' => 'required|integer',
            'stok' => 'required|integer',
            'deskripsi' => 'required|string',
            'tanggal_upload' => 'nullable|date',
            'gambar.*' => 'required|image|mimes:jpeg,png,jpg|max:2048'
        ]);
        $product = Product::create([
            'categories_id' => $request->categories_id,
            'stores_id' => $request->stores_id,
            'nama_produk' => $request->nama_produk,
            'harga' => $request->harga,
            'stok' => $request->stok,
            'deskripsi' => $request->deskripsi,
            'tanggal_upload' => now(),
        ]);
        if ($request->hasFile('gambar')) {
            foreach ($request->file('gambar') as $img) {
                $filename = time() . '_' . uniqid() . '.' . $img->getClientOriginalExtension();
                $img->storeAs('public/gambar-produk', $filename);
                ImageProduct::create([
                    'products_id' => $product->id,
                    'nama_gambar' => $filename,
                ]);
            }
        }
        return redirect()->back()->with('pesan', 'Produk berhasil ditambahkan!');
    }

    public function update(Request $request, $id)
    {
        $product = Product::findOrFail($id);

        $validate = $request->validate([
            'categories_id' => 'required|exists:categories,id',
            'stores_id' => 'required|exists:stores,id',
            'nama_produk' => 'required|string|max:100',
            'harga' => 'required|integer',
            'stok' => 'required|integer',
            'deskripsi' => 'required|string',
            'gambar.*' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $product->update([$validate]);

        if ($request->hasFile('gambar')) {
            foreach ($request->file('gambar') as $img) {
                $filename = time() . '_' . uniqid() . '.' . $img->getClientOriginalExtension();
                $img->storeAs('public/gambar-produk', $filename);
                ImageProduct::create([
                    'products_id' => $product->id,
                    'nama_gambar' => $filename,
                ]);
            }
        }
        return redirect()->back()->with('pesan', 'Produk berhasil diupdate!');
    }

    public function Delete($id){
        $id = $this->decrypId($id);
        $product = Product::findOrFail($id);
        foreach ($product->imageProducts as $image) {
            Storage::delete('public/gambar-produk/' . $image->nama_gambar);
            $image->delete();
        }
        $product->delete();
        return redirect()->back()->with('pesan', 'Produk berhasil dihapus!');
    }

    public function Detail($id){
        $id = $this->decrypId($id);
        $data['product'] = Product::with(['imageProducts', 'category', 'store'])->findOrFail($id);
        return view('Member.Produk.produk-detail', $data);
    }

    public function search(Request $request)
    {
        $keyword = $request->input('q');
        $products = Product::where('nama_produk', 'like', '%' . $keyword . '%')
            ->orWhere('deskripsi', 'like', '%' . $keyword . '%')
            ->get();
        return view('Member.Produk.search-produk', compact('products', 'keyword'));
    }
}
