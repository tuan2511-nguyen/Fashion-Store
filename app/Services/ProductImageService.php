<?php

namespace App\Services;

use App\Models\ProductImage;
use App\Repositories\ProductImageRepository;

class ProductImageService
{
    protected $imageRepository;

    public function __construct(ProductImageRepository $imageRepository)
    {
        $this->imageRepository = $imageRepository;
    }

    public function getAllImages()
    {
        return $this->imageRepository->all();
    }

    public function getImageById($id)
    {
        return $this->imageRepository->findOrFail($id);
    }

    public function createImages($product, $images)
    {
        foreach ($images as $image) {
            $fileName = time() . '_' . $image->getClientOriginalName();
            $path = $image->storeAs('products', $fileName, 'public');
            ProductImage::create([
                'product_id' => $product->id,
                'image_url' => $path,
            ]);
        }
    }


    public function updateImages($id, $product, $newImages, $existingImageIds)
    {
        // Xóa các ảnh không còn tồn tại trong danh sách hiện tại
        $existingImageIds = $existingImageIds ?? [];
        $currentImageIds = $product->images->pluck('id')->toArray();
        $imageIdsToDelete = array_diff($currentImageIds, $existingImageIds);

        if ($imageIdsToDelete) {
            ProductImage::whereIn('id', $imageIdsToDelete)->delete();
        }

        // Cập nhật hoặc thêm ảnh mới
        foreach ($newImages as $image) {
            // Lưu ảnh mới
            $fileName = time() . '_' . $image->getClientOriginalName();
            $path = $image->storeAs('products', $fileName, 'public');

            // Cập nhật hoặc tạo ảnh mới
            ProductImage::updateOrCreate(
                ['id' => $image->id ?? null], // Nếu có ID, thì cập nhật ảnh tương ứng
                [
                    'product_id' => $product->id,
                    'image_url' => $path,
                ]
            );
        }
    }



    public function deleteImage($id)
    {
        $image = $this->imageRepository->findOrFail($id);
        return $this->imageRepository->delete($id);
    }

    public function getTrashedImages()
    {
        return $this->imageRepository->getTrashed();
    }

    public function restoreImage($id)
    {
        return $this->imageRepository->restore($id);
    }

    public function forceDeleteImage($id)
    {
        return $this->imageRepository->forceDelete($id);
    }
}
