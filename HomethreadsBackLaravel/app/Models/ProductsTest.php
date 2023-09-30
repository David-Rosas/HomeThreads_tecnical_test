<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Image;
class ProductsTest extends Model
{
    use HasFactory;
    protected $table = 'products_test';

    protected $fillable = [
        'upc',
        'sku',
        'qty',
        'qty_per_pack',
        'brand',
        'type',
        'name',
        'short_description',
        'description',
        'dimensions',
        'other_dimensions',
        'materials',
        'distressed_finish',
        'color',
        'shape',
        'width',
        'height',
        'length',
        'depth',
        'weight',
        'weight_capacity',
        'shipping_weight',
        'slug',
        'complete_slug',
        'meta_title',
        'meta_keywords',
        'meta_description',
        'collection_name',
        'category_id',
        'related_products',
        'may_need_ids',
        'related_colors',
        'related_sizes',
        'cost_price',
        'price',
        'special_price',
        'image_id',
        'secondary_image_id',
        'additional_images',
        'active',
        'is_crypton',
        'is_new',
        'is_best_seller',
        'on_sale',
        'is_set',
        'is_sheet_set',
        'is_main',
        'is_outdoor',
        'product_care',
        'country',
    ];

    public function images()
    {
        return $this->hasMany(Image::class, 'product_id');
    }
}
