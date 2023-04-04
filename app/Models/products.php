<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class products extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'category_id',
        'app_name',
        'description',
        'price',
        'logo'
        ];

    public function carts()
    {
        return $this->belongsToMany(carts::class);
    }
}
