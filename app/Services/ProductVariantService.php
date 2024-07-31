<?php

// app/Services/ProductVariantService.php
namespace App\Services;

use App\Models\ProductVariant;
use App\Repositories\ProductVariantRepository;

class ProductVariantService
{
    protected $variantRepository;

    public function __construct(ProductVariantRepository $variantRepository)
    {
        $this->variantRepository = $variantRepository;
    }

    public function getAllVariants()
    {
        return $this->variantRepository->all();
    }

    public function getVariantById($id)
    {
        return $this->variantRepository->findOrFail($id);
    }

    public function createVariants($product, $sizes, $colors, $variantsData)
    {
        foreach ($sizes as $sizeId) {
            foreach ($colors as $colorId) {
                $variantKey = "{$sizeId}_{$colorId}";

                if (isset($variantsData[$variantKey])) {
                    ProductVariant::create([
                        'product_id' => $product->id,
                        'size_id' => $sizeId,
                        'color_id' => $colorId,
                        'price' => $variantsData[$variantKey]['price'],
                        'stock_quantity' => $variantsData[$variantKey]['stock_quantity'],
                    ]);
                }
            }
        }
    }


    public function updateVariant($id, array $data)
    {
        return $this->variantRepository->update($id, $data);
    }

    public function deleteVariants($productId)
    {
        ProductVariant::where('product_id', $productId)->delete();
    }


    public function getTrashedVariants()
    {
        return $this->variantRepository->getTrashed();
    }

    public function restoreVariant($id)
    {
        return $this->variantRepository->restoreProductVariants($id);
    }

    public function forceDeleteVariant($id)
    {
        return $this->variantRepository->forceDelete($id);
    }
}
