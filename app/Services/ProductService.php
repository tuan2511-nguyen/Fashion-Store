<?php

// app/Services/ProductService.php
namespace App\Services;

use App\Models\Product;
use App\Repositories\ProductImageRepository;
use App\Repositories\ProductRepository;
use App\Repositories\ProductVariantRepository;

class ProductService
{
    protected $productRepository;

    protected $productVariantRepository;

    protected $productImageRepository;

    protected $productImageService;

    public function __construct(ProductRepository $productRepository, ProductVariantRepository $productVariantRepository, ProductImageRepository $productImageRepository, ProductImageService $productImageService)
    {
        $this->productRepository = $productRepository;
        $this->productVariantRepository = $productVariantRepository;
        $this->productImageRepository = $productImageRepository;
        $this->productImageService = $productImageService;
    }

    public function getAllProducts()
    {
        return $this->productRepository->all();
    }

    public function getProductById($id)
    {
        return Product::with(['category', 'variants', 'images'])
            ->findOrFail($id);
    }

    public function createProduct(array $data)
    {
        $product = Product::create([
            'product_name' => $data['product_name'],
            'product_description' => $data['product_description'],
            'category_id' => $data['category_id'],
        ]);

        return $product;
    }

    public function updateProduct($id, array $data)
    {
        $product = $this->productRepository->update($id, $data);

        $existingVariantIds = $data['existing_variants'] ?? [];
        $currentVariantIds = $product->variants->pluck('id')->toArray();
        $variantIdsToDelete = array_diff($currentVariantIds, $existingVariantIds);

        if ($variantIdsToDelete) {
            $this->productVariantRepository->deleteVariants($variantIdsToDelete);
        }

        // Cập nhật hoặc thêm các biến thể mới
        $variants = [];
        foreach ($data['sizes'] as $sizeId) {
            foreach ($data['colors'] as $colorId) {
                $variantKey = "{$sizeId}_{$colorId}";
                if (isset($data['variants'][$variantKey])) {
                    $variantId = $data['variants'][$variantKey]['id'] ?? null;
                    $variants[] = [
                        'id' => $variantId,
                        'size_id' => $sizeId,
                        'color_id' => $colorId,
                        'price' => $data['variants'][$variantKey]['price'],
                        'stock_quantity' => $data['variants'][$variantKey]['stock_quantity'],
                    ];
                }
            }
        }

        $this->productVariantRepository->updateOrCreateVariants($id, $variants);

        $existingImageIds = $data['existing_images'] ?? [];
        $newImages = $data['images_url'] ?? []; // Giả sử bạn gửi ảnh mới dưới trường 'images_url'

        if ($newImages) {
            $this->productImageService->updateImages($id,$product, $newImages, $existingImageIds);
        }

        return $product;
    }

    public function deleteProduct($id)
    {
        return $this->productRepository->delete($id);
    }

    public function getTrashedProducts()
    {
        return $this->productRepository->getTrashed();
    }

    public function restoreProduct($id)
    {

        $product = $this->productRepository->restore($id);

        if ($product) {
            $this->productVariantRepository->restoreProductVariants($id);

            $this->productImageRepository->restore($id);
        }
    }


    public function forceDeleteProduct($id)
    {
        $this->productRepository->forceDelete($id);
        $this->productVariantRepository->forceDelete($id);
        $this->productImageRepository->forceDelete($id);
    }
}
