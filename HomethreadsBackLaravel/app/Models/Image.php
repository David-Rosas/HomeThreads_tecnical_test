<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\ProductsTest;
use Illuminate\Support\Facades\Storage;

class Image extends Model
{
    use HasFactory;
    protected $fillable = ['product_id', 'filename'];

    public function product()
    {
        return $this->belongsTo(ProductTest::class, 'product_id');
    }
}
