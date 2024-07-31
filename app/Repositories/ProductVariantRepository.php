<?php

// app/Repositories/ProductVariantRepository.php
namespace App\Repositories;

use App\Models\ProductVariant;
use Illuminate\Support\Facades\Log;

class ProductVariantRepository
{
    public function find($id)
    {
        return ProductVariant::find($id);
    }

    public function findOrFail($id)
    {
        return ProductVariant::findOrFail($id);
    }

    public function all()
    {
        return ProductVariant::all();
    }

    public function create(array $data)
    {
        return ProductVariant::create($data);
    }

    public function update($id, array $data)
    {
        $variant = ProductVariant::findOrFail($id);
        $variant->update($data);
        return $variant;
    }

    public function delete($productId)
    {
        ProductVariant::where('product_id', $productId)->delete();
    }
    public function deleteVariants(array $variantIds)
    {
        ProductVariant::whereIn('id', $variantIds)->forceDelete();
    }


    public function getTrashed()
    {
        return ProductVariant::onlyTrashed()->get();
    }

    public function restoreProductVariants($productId)
    {
        $variants = ProductVariant::onlyTrashed()->where('product_id', $productId)->get();
        foreach ($variants as $variant) {
            $variant->restore();
        }
        return $variants;
    }

    public function forceDelete($productId)
    {
        ProductVariant::onlyTrashed()->where('product_id', $productId)->forceDelete();
    }
    public function updateOrCreateVariants($productId, array $variants)
    {
        foreach ($variants as $variant) {
            if (isset($variant['id'])) {
                // Cập nhật biến thể nếu ID tồn tại
                ProductVariant::where('id', $variant['id'])->update([
                    'size_id' => $variant['size_id'],
                    'color_id' => $variant['color_id'],
                    'price' => $variant['price'],
                    'stock_quantity' => $variant['stock_quantity'],
                ]);
            } else {
                // Tạo biến thể mới nếu ID không tồn tại
                ProductVariant::create([
                    'product_id' => $productId,
                    'size_id' => $variant['size_id'],
                    'color_id' => $variant['color_id'],
                    'price' => $variant['price'],
                    'stock_quantity' => $variant['stock_quantity'],
                ]);
            }
        }
    }
}
