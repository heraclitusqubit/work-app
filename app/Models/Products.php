<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;

class Products extends Model
{
 protected $table = 'products';
    protected $primaryKey = 'id';
    protected $fillable = [
        'code_product',
        'name_product',
        'image_product',
        'category',
        'activate',
        'price',
        'stok',
        'notes'

    ];

    protected static function booted()
    {
        static::deleting(function ($product) {
            if ($product->image_product) {
                // Hapus dari storage/app/public
                if (Storage::disk('public')->exists($product->image_product)) {
                    Storage::disk('public')->delete($product->image_product);
                }

                // Hapus dari public/storage
                $filePath = public_path('storage/' . $product->image_product);
                if (File::exists($filePath)) {
                    File::delete($filePath);
                }
            }
        });
    }
}
