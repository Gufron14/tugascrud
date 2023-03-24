@extends('layout.apps')

@section('content')
    <h4 class="mx-auto mt-3 mb-3">Keranjang</h4>
    <table class="table table-bordered">
        <thead>
            <tr>
                {{-- <th>Kategori</th> --}}
                <th>Nama Aplikasi</th>
                <th>Qty</th>
                <th>Total Harga</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>Kinemaster</td>
                <td>2</td>
                <td>Rp. 110.000</td>
            </tr>
            {{-- @foreach($carts->products as $product)
            <tr>
                <td>{{ $product->name }}</td>
                <td>{{ $product->pivot->qty }}</td>
                <td>{{ $product->price_total }}</td>
            </tr>
            @endforeach --}}
        </tbody>
    </table>
@endsection