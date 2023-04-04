@extends('layout.apps')

@section('content')

    @if (session('message'))
    <div class="alert alert-success mt-3">
        {{ session('message') }} 
    </div>
    @endif

    <div class="container">
        <h4 class="mt-3 text-center">Edit Aplikasi</h4>
            <div class="card  mt-3 mb-5 w-50 mx-auto">
                <div class="card-body">
                    <form method="POST" action="{{ route('products.update', ['id' => $product->id]) }}">
                        @csrf
                        @method('PUT')
                        <select class="form-select mt-3 mb-3 @error('category_id') is-invalid @enderror" name="category_id" id="category_id" aria-label="Default select example">
                            <option selected class="text-muted">--Pilih Kategori Aplikasi--</option>
                                @foreach ($categories as $item)
                                    <option value="{{ $item->id }}" @if($item->id == $product->category_id) selected @endif> {{ $item->category_name }}</option>
                                @endforeach                               
                        </select>  
                        @error('category_id')
                            <div class="invalid-feedback">
                                Pilih salah satu kategori
                            </div>
                        @enderror 
                        <div class="mb-3">
                            <label for="app_name" class="form-label">Nama Aplikasi</label>
                            <input type="text" class="form-control"
                            id="app_name" name="app_name" value="{{ old('app_name', $product->app_name) }}">
                        </div>
                        <div class="mb-3">
                            <label for="price" class="form-label">Harga</label>
                            <input type="text" class="form-control @error('price') is-invalid @enderror"
                                id="price" name="price" value="{{ old('price', $product->price) }}">
                            @error('price')
                                <div class="invalid-feedback">
                                    Harga tidak boleh kosong
                                </div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="description" class="form-label">Deskripsi</label>
                            <input type="text" class="form-control" id="description" name="description" value="{{ old('description', $product->description) }}">
                        </div>
                        @if ($product->logo)
                            <div class="mb-3">
                                <img style="max-width:50px;max-height:50px" src="{{ url('logo').'/'.$product->logo }}" alt="">
                            </div>
                        @endif
                        <div class="mb-3 mt-3">
                            <label for="logo" class="form-label">Logo</label>
                            <input type="file" class="form-control" name="logo" id='logo'>
                        </div>
                        <a href=" {{ route('applications') }} " class="btn btn-danger mt-3">Batal</a>
                        <button type="submit" class="btn btn-primary mt-3">Ubah</button>
                    </form>
                </div>
            </div>
    </div>
@endsection
