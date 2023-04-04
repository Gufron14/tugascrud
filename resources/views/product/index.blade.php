@extends('layout.apps')

@section('content')

  @if (session('message'))
    <div class="alert alert-success mt-3">
        {{ session('message') }} 
    </div>
  @endif

        
  <div class="d-flex justify-content-between align-items-center">
    <h4 class="mt-5 mb-3">Daftar Aplikasi Premium Android</h4>
    <div class="d-flex gap-3">
      <a href="{{ url('/addCategory') }}">
        <button class="btn btn-primary fw-bold mt-5 mb-3">+ Kategori</button>
      </a>
      <a href="{{ url('/add') }}">
        <button class="btn btn-primary fw-bold mt-5 mb-3">+ Aplikasi</button>
      </a>
    </div>
  </div>
  
        
        <table class="table table-bordered mx-auto mb-5">
            <thead class="table-secondary">
              <tr>
                {{-- <th class="text-center">No</th> --}}
                <th>Kategori</th>
                <th>Logo Aplikasi</th>
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
                    <td class="mx-auto text-center">
                      @if ($product->logo)
                          <img style="max-width:50px;max-height:50px" src="{{ url('logo').'/'.$product->logo }}" alt=""/>
                      @endif
                    </td>
                    <td> {{ $product->app_name }} </td>
                    <td> Rp. {{ $product->price }}</td>
                    <td> {{ $product->description }} </td>
                    <td class="text-center">  
                      <a href="{{ url('/products/'.$product->id.'/edit') }}">
                        <button type="submit" class="btn btn-warning">
                          <i class="fas fa-edit"></i>
                        </button>
                      </a>
                    </td> 
                    <td class="text-center">
                      <form action="{{ route('products.destroy', $product->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">
                          <i class="fas fa-trash-alt"></i>
                        </button>
                      </form>
                    </td>
                    {{-- <td class="text-center">
                      <form method="POST" action="{{ route('carts.add', $product->id) }}">
                        @csrf
                          <button type="btn btn-warning submit">+ Cart</button>
                        </form>
                    </td> --}}
                  </tr>
                @endforeach
              @endforeach
            </tbody>
          </table>
@endsection