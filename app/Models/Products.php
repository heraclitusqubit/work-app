<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
 protected $table = 'products';
    protected $primaryKey = 'id';
    protected $fillable = [
        'code_product',
        'name_product',
        'image_product',
        'category',
        'price',
        'stok',
        'notes'

    ];
}
