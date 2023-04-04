@extends('layout.apps')

@section('content')

    @if (session('message'))
    <div class="alert alert-success mt-3">
        {{ session('message') }}
    </div>
    @endif

    <div class="container">
        <h4 class="mt-5 mb-5 text-center">Tambah Kategori</h4>
        <div class="row">
          <div class="col-md-6 col-lg-6 mb-3">
            <div class="card">
              <div class="card-body">
                <form action="{{ url('/store') }}" method="POST">
                  @csrf
                  <label for="aplikasi" class="form-label mt-3">Nama Kategori Aplikasi</label>
                  <input type="text" name="category_name" id="aplikasi" class="form-control @error('category_name') is-invalid @enderror">
                  @error('category_name')
                  <div class="invalid-feedback">
                    Nama Kategori Aplikasi tidak boleh kosong
                  </div>
                  @enderror
                  <button class="btn btn-primary mt-3">+ Kategori Aplikasi</button>
                </form>
              </div>
            </div>
          </div>
          <div class="col-md-6 col-lg-6 mb-3">
            <div class="card">
              <div class="card-body">
                <table class="table table-bordered mx-auto">
                  <thead class="table-secondary">
                    <tr>
                      <th>Kategori Tersedia :</th>
                      <th class="text-center" colspan="2">Aksi</th>
                    </tr>
                  </thead>
                  <tbody class="align-middle">
                    @foreach($categories as $category)
                    <tr>
                      <td> {{ $category->category_name }} </td>
                      <td class="text-center">
                        <a href="{{ url('/categories/'.$category->id.'/editCategory') }}">
                          <button type="submit" class="btn btn-warning">
                            <i class="fas fa-edit"></i>
                          </button>
                        </a>                     
                      <td class="text-center">                     
                        <form action="{{ route('category.destroy', $category->id) }}" method="POST">
                          @csrf
                          @method('DELETE')
                          <button type="submit" class="btn btn-danger">
                            <i class="fas fa-trash-alt"></i>
                          </button>
                        </form>
                      </td>
                    </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

@endsection
