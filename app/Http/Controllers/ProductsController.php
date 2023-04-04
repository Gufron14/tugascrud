<?php

namespace App\Http\Controllers;

use App\Models\products;
use App\Models\category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    // public function welcome(){
        
    //     return view('welcome');
    // }

    public function welcome()
    {
        //
        return view('welcome');

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $title = 'Tambah Aplikasi';
        $data['categories'] =  category::all();
        $product = products::all();
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
            'category_id' => 'required|exists:categories,id',
            'description' => 'string',
            'logo' => 'required|mimes:jpeg,jpg,png,gif'
        ]);

        $logo_file = $request->file('logo');
        $logo_ekstensi = $logo_file->extension();
        $logo_nama = date('ymdhis').".".$logo_ekstensi;
        $logo_file->move(public_path('logo'), $logo_nama);

        // simpan data ke database
        $data = [
            'app_name' => $request->input('app_name'),
            'price' => $request->input('price'),
            'category_id' => $request->input('category_id'),
            'description' => $request->input('description'),
            'logo' => $logo_nama
        ];
        Products::create($data);

        // kirim pesan ke halaman add
        session()->flash('message', 'Aplikasi berhasil ditambahkan');

        // redirect ke halaman add
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     */
    public function show(Products $product)
    {
        //
        $title = 'GufronDroid CRUD';
        $categories = category::all();
        $products = products::all();
        return view('product.index', compact('title','categories', 'products'));
        
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $title = 'Edit Aplikasi';
        $product = Products::findOrFail($id);
        $data['categories'] = Category::all();
        return view('product.edit', $data, compact('product', 'title'));
    
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
    $request->validate([
        'app_name' => 'required|unique:products,app_name,'.$id,
        'price' => 'required|numeric|min:0',
        'category_id' => 'required|exists:categories,id',
        'description' => 'required|string',
        'logo' => 'nullable|mimes:jpeg,jpg,png,gif'
    ]); 

    $product = Products::find($id);
    if(!$product){
        return back()->withErrors(['message' => 'aplikasi tidak ditemukan']);
    }

    $data = [
        'app_name' => $request->input('app_name'),
        'price' => $request->input('price'),
        'description' => $request->input('description'),
        'category_id' => $request->input('category_id'),
    ];

    if($request->hasFile('logo')) {
        $request->validate([
            'logo' => 'mimes:jpeg,jpg,png,gif'
        ]);
    $logo_file = $request->file('logo');
    $logo_ekstensi = $logo_file->extension();
    $logo_nama = date('ymdhis').".".$logo_ekstensi;
    $logo_file->move(public_path('logo'), $logo_nama);
        
    $data_logo = Products::where('app_name', $id)->first();
    File::delete(public_path('logo'."/".$data_logo->logo));

    $data ['logo'] = $logo_nama;
    
    }
    
    $product->update($data);

    session()->flash('message', 'Aplikasi berhasil diedit');

    return redirect()->action([ProductsController::class, 'show']);
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

        if ($products->logo) {
            File::delete(public_path('logo') . "/" . $products->logo);
        }

        session()->flash('message', 'Aplikasi berhasil dihapus');

        return redirect()->back();
    }

}
