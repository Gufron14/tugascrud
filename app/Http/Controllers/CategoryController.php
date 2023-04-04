<?php

namespace App\Http\Controllers;

use App\Models\category;
use App\Models\products;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    //
    public function create()
    {
        $title = 'Kategori Aplikasi';
        $data['categories'] =  category::all();
        return view('product.addCategory', $data, compact('title'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'category_name' => 'required|unique:categories'
        ]);

        // simpan data ke database
        $categories= new category;
        $categories->category_name = $request->category_name;
        $categories->save();

        // kirim pesan ke halaman add
        session()->flash('message', 'Kategori Aplikasi berhasil ditambahkan! ');

        // redirect ke halaman add
        return redirect()->back();
    }

    public function edit(Request $request, $id){

        $title = 'Edit Kategori';
        $category = category::findOrFail($id);
        return view('product.editCategory', compact('category', 'title'));

    }

    public function update(Request $request, string $id)
    {
        $request->validate([
            'category_name' => 'required|string',
        ]);

        $data = [
            'category_name' => $request->input('category_name')
        ];

        category::where('id', $id)->update($data);

        session()->flash('Kategori diperbaharui');
        
        return redirect()->route('addCategory');
    }

    public function destroy($id){

        // Temukan produk berdasarkan ID
        $category = category::find($id);

        // Hapus item produk
        $category->delete();

        session()->flash('message', 'Kategori berhasil dihapus');

        return redirect()->back();
    }
}
