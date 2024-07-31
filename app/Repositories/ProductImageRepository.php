<?php

namespace App\Repositories;

use App\Models\ProductImage;

class ProductImageRepository
{
    public function find($id)
    {
        return ProductImage::find($id);
    }

    public function findOrFail($id)
    {
        return ProductImage::findOrFail($id);
    }

    public function all()
    {
        return ProductImage::all();
    }

    public function create(array $data)
    {
        return ProductImage::create($data);
    }

    public function update($id, $path)
    {
        return ProductImage::where('id', $id)->update([
            'image_url' => $path,
        ]);
    }


    public function delete($id)
    {
        $image = ProductImage::findOrFail($id);
        return $image->delete();
    }

    public function getTrashed()
    {
        return ProductImage::onlyTrashed()->get();
    }

    public function restore($id)
    {
        $images = ProductImage::onlyTrashed()->where('product_id', $id)->get();
        foreach ($images as $image) {
            $image->restore();
        }
        return $images;
    }

    public function forceDelete($productId)
    {
        ProductImage::onlyTrashed()->where('product_id', $productId)->forceDelete();
    }
}
