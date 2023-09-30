<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('products_test', function (Blueprint $table) {
            $table->id();
            $table->string('upc', 255)->nullable();
            $table->string('sku', 250)->nullable();
            $table->integer('qty')->nullable();
            $table->integer('qty_per_pack')->nullable();
            $table->string('brand', 250)->nullable();
            $table->string('type', 250)->nullable();
            $table->string('name', 255)->nullable();
            $table->text('short_description')->nullable();
            $table->text('description')->nullable();
            $table->text('dimensions')->nullable();
            $table->text('other_dimensions')->nullable();
            $table->text('materials')->nullable();
            $table->integer('distressed_finish')->nullable();
            $table->string('color', 250)->nullable();
            $table->string('shape', 50)->nullable();
            $table->double('width', 15, 2)->nullable();
            $table->double('height', 15, 2)->nullable();
            $table->double('length', 15, 2)->nullable();
            $table->double('depth', 15, 2)->nullable();
            $table->double('weight', 15, 2)->nullable();
            $table->double('weight_capacity', 15, 2)->nullable();
            $table->double('shipping_weight', 15, 2)->nullable();
            $table->string('slug', 250)->nullable();
            $table->string('complete_slug', 250)->nullable();
            $table->string('meta_title', 250)->nullable();
            $table->string('meta_keywords', 255)->nullable();
            $table->string('meta_description', 255)->nullable();
            $table->string('collection_name', 250)->nullable();
            $table->integer('category_id')->nullable();
            $table->text('related_products')->nullable();
            $table->text('may_need_ids')->nullable();
            $table->text('related_colors')->nullable();
            $table->text('related_sizes')->nullable();
            $table->decimal('cost_price', 10, 2)->nullable();
            $table->decimal('price', 10, 2)->default(0.00);
            $table->decimal('special_price', 10, 2)->nullable();
            $table->integer('image_id')->nullable();
            $table->integer('secondary_image_id')->nullable();
            $table->text('additional_images')->nullable();
            $table->integer('active')->default(0);
            $table->integer('is_crypton')->nullable();
            $table->integer('is_new')->nullable();
            $table->integer('is_best_seller')->nullable();
            $table->integer('on_sale')->nullable();
            $table->string('is_set', 20)->nullable();
            $table->string('is_sheet_set', 20)->nullable();
            $table->string('is_main', 20)->nullable();
            $table->string('is_outdoor', 3)->nullable();
            $table->text('product_care')->nullable();
            $table->string('country', 100)->nullable();
            $table->timestamps();
            $table->index('sku');
            $table->index('slug');
            $table->index('active');
            $table->index('category_id');
            $table->index('complete_slug');
            $table->index('upc', '250');
            $table->fulltext('name');
            $table->fulltext('brand');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products_test');
    }
};
