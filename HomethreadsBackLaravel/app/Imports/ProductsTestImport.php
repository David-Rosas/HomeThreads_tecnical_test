<?php

namespace App\Imports;

use App\Models\Image;
use App\Models\ProductsTest;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class ProductsTestImport implements ToModel, WithHeadingRow
{

    public function model(array $row)
    {
        $product = new ProductsTest([
            'upc' => isset($row['upc']) ? $row['upc'] : null,
            'sku' => isset($row['sku']) ? $row['sku'] : null,
            'qty' => isset($row['qty']) ? $row['qty'] : null,
            'qty_per_pack' => isset($row['qty_per_pack']) ? $row['qty_per_pack'] : null,
            'brand' => isset($row['brand']) ? $row['brand'] : null,
            'type' => isset($row['type']) ? $row['type'] : null,
            'name' => isset($row['product_name']) ? $row['product_name'] : null,
            'short_description' => isset($row['short_description']) ? $row['short_description'] : null,
            'description' => isset($row['description']) ? $row['description'] : null,
            'dimensions' => isset($row['dimensions']) ? $row['dimensions'] : null,
            'other_dimensions' => isset($row['other_dimensions']) ? $row['other_dimensions'] : null,
            'materials' => isset($row['materials']) ? $row['materials'] : null,
            'distressed_finish' => isset($row['distressed_finish']) ? $row['distressed_finish'] : null,
            'color' => isset($row['color']) ? $row['color'] : null,
            'shape' => isset($row['shape']) ? $row['shape'] : null,
            'width' => isset($row['product_width']) ? $row['product_width'] : null,
            'height' => isset($row['product_height']) ? $row['product_height'] : null,
            'length' => isset($row['product_length']) ? $row['product_length'] : null,
            'depth' => isset($row['depth']) ? $row['depth'] : null,
            'weight' => isset($row['Product Weight']) ? $row['Product Weight'] : null,
            'weight_capacity' => isset($row['weight_capacity']) ? $row['weight_capacity'] : null,
            'shipping_weight' => isset($row['shipping_weight']) ? $row['shipping_weight'] : null,
            'slug' => isset($row['slug']) ? $row['slug'] : null,
            'complete_slug' => isset($row['complete_slug']) ? $row['complete_slug'] : null,
            'meta_title' => isset($row['meta_title']) ? $row['meta_title'] : null,
            'meta_keywords' => isset($row['meta_keywords']) ? $row['meta_keywords'] : null,
            'meta_description' => isset($row['meta_description']) ? $row['meta_description'] : null,
            'collection_name' => isset($row['collection_name']) ? $row['collection_name'] : null,
            'category_id' => isset($row['category_id']) ? $row['category_id'] : null,
            'related_products' => isset($row['related_products']) ? $row['related_products'] : null,
            'may_need_ids' => isset($row['may_need_ids']) ? $row['may_need_ids'] : null,
            'related_colors' => isset($row['related_colors']) ? $row['related_colors'] : null,
            'related_sizes' => isset($row['related_sizes']) ? $row['related_sizes'] : null,
            'cost_price' => isset($row['cost_price']) ? $row['cost_price'] : null,
            'price' => isset($row['map_sale_retail']) ? $row['map_sale_retail'] : 0,
            'special_price' => isset($row['special_price']) ? $row['special_price'] : null,
            'image_id' => isset($row['image_id']) ? $row['image_id'] : null,
            'secondary_image_id' => isset($row['secondary_image_id']) ? $row['secondary_image_id'] : null,
            'additional_images' => isset($row['additional_images']) ? $row['additional_images'] : null,
            'active' => isset($row['active']) ? $row['active'] : 1,
            'is_crypton' => isset($row['is_crypton']) ? $row['is_crypton'] : null,
            'is_new' => isset($row['is_new']) ? $row['is_new'] : null,
            'is_best_seller' => isset($row['is_best_seller']) ? $row['is_best_seller'] : null,
            'on_sale' => isset($row['on_sale']) ? $row['on_sale'] : null,
            'is_set' => isset($row['is_set']) ? $row['is_set'] : null,
            'is_sheet_set' => isset($row['is_sheet_set']) ? $row['is_sheet_set'] : null,
            'is_main' => isset($row['is_main']) ? $row['is_main'] : null,
            'is_outdoor' => isset($row['is_outdoor']) ? $row['is_outdoor'] : null,
            'product_care' => isset($row['product_care']) ? $row['product_care'] : null,
            'country' => isset($row['country_of_origin']) ? $row['country_of_origin'] : null,

        ]);

        $product->save();

        for ($index = 1; $index <= 6; $index++) {
            if (isset($row['image_' . $index])) {
                $imageUrl = $row['image_' . $index];

                if (filter_var($imageUrl, FILTER_VALIDATE_URL) && isset($product->id)) {
                    $image = new Image([
                        'product_id' => $product->id,
                        'filename' => $this->downloadAndStoreImage($imageUrl, $product->id),
                    ]);

                    $image->save();
                }
            }
        }

        return $product;

    }

    protected function downloadAndStoreImage($imageUrl, $id)
    {
        $extension = pathinfo($imageUrl, PATHINFO_EXTENSION);
        $random = Str::random(8);
        $filename = "product_{$id}_image_{$random}." . $extension;

        while (Storage::disk('public')->exists('product_images/' . $filename)) {
            $random = Str::random(8);
            $filename = "product_{$id}_image_{$random}." . $extension;
        }

        $imageContents = Http::get($imageUrl)->body();
        Storage::disk('public')->put('product_images/' . $filename, $imageContents);

        return $filename;

    }
}
