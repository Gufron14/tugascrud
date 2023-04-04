<?php

namespace App\Http\Controllers;

use App\Models\carts;
use Illuminate\Http\Request;

class CartsController extends Controller
{   

    public function cartsPage(){
        $title = 'Keranjang | GufronDroid';
        $data['carts'] = carts::all();
        return view('product.carts', $data, compact('title'));
    }

}
