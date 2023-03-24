@extends('layout.apps')

@section('content')

    @if (session('message'))
    <div class="alert alert-success mt-3">
        {{ session('message') }} 
    </div>
    @endif

    <div class="container">
        <h4 class="mt-3 text-center">Tambah Aplikasi</h4>
            <div class="card  mt-3 mb-5 w-50 mx-auto">
                <div class="card-body">
                    <form action="{{ route('products.update', $products->id) }}" method="POST">
                        @method('PUT')
                        @csrf
                        <select class="form-select mt-3 @error('category_id') is-invalid @enderror" name="category_id" id="kategori" aria-label="Default select example">
                            <option selected class="text-muted">--Pilih Kategori Aplikasi--</option>
                                @foreach ($categories as $item)
                                <option value="{{ $item->id }}" @if($item->id == $products->category_id) selected @endif> {{ $item->category_name }}</option>
                                @endforeach                               
                        </select>  
                        @error('category_id')
                            <div class="invalid-feedback">
                                Pilih salah satu kategori
                            </div>
                        @enderror 
                        <div class="mb-3">
                            <label for="aplikasi" class="form-label">Nama Aplikasi</label>
                            <input type="text" class="form-control @error('app_name') is-invalid @enderror"
                            id="exampleInputEmail1" name="app_name" value="{{ old('app_name', $products->app_name) }}">
                            @error('app_name')
                                <div class="invalid-feedback">
                                    Nama Aplikasi tidak boleh kosong!
                                </div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputPassword1" class="form-label">Harga</label>
                            <input type="text" class="form-control @error('price') is-invalid @enderror"
                                id="exampleInputPassword1" name="price" value="{{ old('price', $products->price) }}">
                            @error('price')
                                <div class="invalid-feedback">
                                    Harga tidak boleh kosong
                                </div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="description" class="form-label">Deskripsi</label>
                            <input type="text" class="form-control" id="description" name="description" value="{{ old('description', $products->description) }}">
                        </div>
                        <button type="submit" class="btn btn-primary mt-3">Ubah</button>
                    </form>
                </div>
            </div>
    </div>
@endsection
