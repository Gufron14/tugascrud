<?php

namespace App\Http\Controllers;

use App\Models\products;
use App\Models\category;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $title = 'GufronDroid CRUD';
        $categories = category::all();
        $products = products::all();
        return view('product.index', compact('title','categories', 'products'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $title = 'Tambah Aplikasi';
        $data['categories'] =  category::all();
        return view('product.add', $data, compact('title'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // validasi data
        $request->validate([
            'app_name' => 'required|unique:products',
            'price' => 'required|numeric',
            'category_id' => 'required|exists:categories,id'
        ]);

        // simpan data ke database
        $product = new products;
        $product->app_name = $request->app_name;
        $product->price = $request->price;
        $product->description = $request->description;
        $product->category_id = $request->category_id; // tambahkan ini
        $product->save();

        // kirim pesan ke halaman add
        session()->flash('message', 'Aplikasi berhasil ditambahkan');

        // redirect ke halaman add
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $title = 'Edit Aplikasi';
        $product = Products::findOrFail($id);
        $categories = Category::all();
        
        return view('product.edit', compact('title', 'products', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // validasi data input
        $validated = $request->validate([
            'category_id' => 'required|exists:categories,id',
            'app_name' => 'required',
            'price' => 'required|numeric',
            'description' => 'required',
            ]);

        // ambil data produk dengan ID tertentu
        $product = products::findOrFail($id);

        // update data produk dengan data input yang telah divalidasi
        products::where('id', $id)->update([
            'category_id' => $validated['category_id'],
            'app_name' => $validated['app_name'],
            'price' => $validated['price'],
            'description' => $validated['description']
        ]);

        // kirim pesan ke halaman add
        session()->flash('message', 'Aplikasi berhasil diedit');

        // redirect ke halaman edit
        return redirect()->route('products.edit', $product->id);
        }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // Temukan produk berdasarkan ID
        $products = products::find($id);

        // Hapus relasi dengan kategori jika diperlukan
        if ($products->category) {
            $products->category->products()->detach($products->id);
        }

        // Hapus item produk
        $products->delete();

        return redirect()->back()
            ->with('success', 'Berhasil dihapus.');
    }
}
