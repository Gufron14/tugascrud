@extends('layout.apps')

@section('content')
    
    <h4 class="mb-5 mt-3 text-center">Keranjang</h4>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Nama Aplikasi</th>
                <th>Kuantitas</th>
                <th>Jumlah Harga</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>Kinemaster</td>
                <td>

                    <div class="col-lg-2">
                        <div class="input-group">
                            <span class="input-group-btn">
                                <button type="button" class="quantity-left-minus btn btn-secondary btn-number"  data-type="minus" data-field="">
                                    -
                                </button>
                            </span>
                                <input type="text" id="quantity" name="quantity" class="form-control input-number" value="10" min="1" max="100">
                            <span class="input-group-btn">
                                <button type="button" class="quantity-right-plus btn btn-secondary btn-number" data-type="plus" data-field="">
                                    +
                                </button>
                            </span>
                        </div>
                    </div>

                </td>
                <td>Rp. 100000</td>
            </tr>
        </tbody>
    </table>


    {{-- $(document).ready(function(){

        var quantitiy=0;
           $('.quantity-right-plus').click(function(e){
                
                // Stop acting like a button
                e.preventDefault();
                // Get the field name
                var quantity = parseInt($('#quantity').val());
                
                // If is not undefined
                    
                    $('#quantity').val(quantity + 1);
        
                  
                    // Increment
                
            });
        
             $('.quantity-left-minus').click(function(e){
                // Stop acting like a button
                e.preventDefault();
                // Get the field name
                var quantity = parseInt($('#quantity').val());
                
                // If is not undefined
              
                    // Increment
                    if(quantity>0){
                    $('#quantity').val(quantity - 1);
                    }
            });
            
        }); --}}

@endsection