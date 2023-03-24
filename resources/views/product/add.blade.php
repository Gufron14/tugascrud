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
                    <form action="{{ route('add.store') }}" method="POST">
                    @csrf
                        <select class="form-select mt-3 @error('category_id') is-invalid @enderror" name="category_id" id="kategori" aria-label="Default select example">
                            <option selected class="text-muted">--Pilih Kategori Aplikasi--</option>
                                @foreach ($categories as $item)
                                    <option value="{{ $item->id }}"> {{ $item->category_name }}</option>
                                @endforeach                               
                        </select>  
                        @error('category_id')
                            <div class="invalid-feedback">
                                Pilih salah satu kategori
                            </div>
                        @enderror 
                        <label for="aplikasi" class="form-label mt-3">Nama Aplikasi</label>
                        <input type="text" name="app_name" id="aplikasi" class="form-control @error('name') is-invalid @enderror">
                            @error('name')
                                <div class="invalid-feedback">
                                    Nama Aplikasi tidak boleh kosong
                                </div>
                            @enderror
                        <label for="harga" class="form-label mt-3">Harga</label>
                        <input type="text" name="price" id="harga" class="form-control @error('price') is-invalid @enderror">
                        @error('price')
                                <div class="invalid-feedback">
                                    Harga tidak boleh kosong
                                </div>
                            @enderror
                        <label for="description" class="form-label mt-3">Deskripsi</label>
                        <div class="form-floating text-muted">
                            <textarea class="form-control" name="description" placeholder="Leave a comment here" id="floatingTextarea"></textarea>
                            <label for="floatingTextarea">Tambah Deskripsi</label>
                        </div>
                        <button class="btn btn-primary mt-3">Tambah Aplikasi</button>
                    </form>
                </div>
            </div>
    </div>
@endsection
