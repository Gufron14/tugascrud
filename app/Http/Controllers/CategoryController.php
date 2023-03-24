<?php

namespace App\Http\Controllers;

use App\Models\category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    //
    public function create()
    {
        $title = 'Tambah Kategori Aplikasi';
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

    // public function edit(){

    //     $title = 'Edit Kategori';
    //     $categories = categories::all();
    //     return view('category.edit', compact('title','categories'));

    // }

    // public function update(Request $request, string $id){

    //     $validated = $request->validate([
    //         'category_name' => 'required'
    //     ]);

    //     $category = categories::find($id);

    //     categories::where('id', $id)->update([
    //         'category_name' => $validated['category_name']
    //     ]);

    //     session()->flash('message', 'Aplikasi berhasil diedit');

    //     return redirect()->back();
    // }

    // public function submit(Request $request, $id)
    // {

    //     $category_name = $request->input('category_name');

    //     $categories = category::find('id');

    //     $categories = new category;
    //     $categories->category_name = $category_name;
    //     $categories->save();

    //     return redirect()->back();
    // }

    public function destroy($id){

        // Temukan produk berdasarkan ID
        $category = category::find($id);

        // Hapus item produk
        $category->delete();

        return redirect()->back()
            ->with('success', 'Kategori berhasil dihapus.');
    }
}
