@extends('layout.apps')

@section('content')
        <a href="{{ url('/addCategory') }}">
          <button class="btn btn-primary fw-bold mt-5 mb-3"> + Kategori </button>
        </a>
        <a href="{{ url('/add') }}">
          <button class="btn btn-primary fw-bold mt-5 mb-3"> + Aplikasi </button>
        </a>
        <a href="{{ url('/carts') }}">
            <button class="btn btn-warning mb-3 fw-bold mt-5">Keranjang</button>
        </a>
        
        <table class="table table-bordered mx-auto mb-5">
            <thead class="table-secondary">
              <tr>
                {{-- <th class="text-center">No</th> --}}
                <th>Kategori</th>
                <th>Nama Aplikasi</th>
                <th>Harga</th>
                <th>Deskripsi</th>
                <th class="text-center" colspan="3">Aksi</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($categories as $category)
                <tr class="align-middle">
                  <td rowspan="{{ $category->products->count() + 1 }}">{{ $category->category_name }}</td>
                </tr>
                @foreach($category->products as $product)
                  <tr class="align-middle">
                    <td> {{ $product->app_name }} </td>
                    <td> Rp. {{ $product->price }}</td>
                    <td> {{ $product->description }} </td>
                    <td class="text-center">
                        
                      <a href="">
                        <button type="submit" class="btn btn-primary">
                          Edit
                        </button>
                      </a>

                    </td>
                    <td class="text-center">
                      <form action="{{ route('products.destroy', $product->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Del</button>
                      </form>
                    </td>
                    <td class="text-center">
                        <button class="btn btn-warning" type="submit">+ Cart</button>
                    </td>
                  </tr>
                @endforeach
              @endforeach
            </tbody>
          </table>
@endsection