@extends('layout.apps')

@section('content')

    @if (session('message'))
    <div class="alert alert-success mt-3">
        {{ session('message') }}
        <a href="{{ url('/add') }}" class="float-right">
            tambah ke aplikasi?
        </a>
    </div>
    @endif

    <div class="container">
        <h4 class="mt-5 mb-3 text-center">Tambah Kategori</h4>
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
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                          Edit
                        </button>   
                      
                      <td class="text-center">                     
                        <form action="{{ route('category.destroy', $category->id) }}" method="POST">
                          @csrf
                          @method('DELETE')
                          <button type="submit" class="btn btn-danger">Del</button>
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

    {{-- <!--  Edit Kategori Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Form</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <form method="POST" action="{{ route('form.submit') }}">
              @csrf
              <div class="mb-3">
                <label for="aplikasi" class="form-label mt-3">Nama Kategori Aplikasi</label>
                  <input type="text" name="category_name" id="aplikasi" class="form-control @error('category_name') is-invalid @enderror">
                  @error('category_name')
                  <div class="invalid-feedback">
                    Nama Kategori Aplikasi tidak boleh kosong
                  </div>
                  @enderror
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                <button type="submit" class="btn btn-primary">Ubah</button>
              </div>
            </form>            
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
            <button type="submit" class="btn btn-primary">Simpan</button>
          </div>
        </div>
      </div>
    </div> --}}

      
@endsection
