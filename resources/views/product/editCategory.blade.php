@extends('layout.apps')

@section('content')
    <h3 class="text-center fw-bold mt-3 mb-3">Edit Kategori</h3>

    <div class="card">
        <div class="card-body">
          <form action="{{ route('categories.editCategory', ['id' => $category->id]) }}" method="POST">
            @csrf
            @method('PUT')
                <label for="aplikasi" class="form-label mt-3">Nama Kategori Aplikasi</label>
                <input type="text" name="category_name" id="aplikasi"  class="form-control 
                @error('category_name') is-invalid @enderror" value=" {{ old('category_name', $category->category_name ) }} ">
            @error('category_name')
            <div class="invalid-feedback">
              Nama Kategori Aplikasi tidak boleh kosong
            </div>
            @enderror

            <a href=" {{ route('addCategory') }} " class="btn btn-danger mt-3">Batal</a>
            <button type="submit" class="btn btn-primary mt-3">Ubah</button>
            
          </form>
        </div>
      </div>

@endsection