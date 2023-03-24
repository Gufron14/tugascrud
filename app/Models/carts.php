<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class carts extends Model
{
    use HasFactory;

    protected $fillable = [
        'product_id',
        'qty',
        'price_total'
    ];
    public function products(){
        return $this->belongsToMany(products::class);
    }
}
