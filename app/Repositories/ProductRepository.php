<?php
namespace App\Repositories;

use App\Models\Product;

class ProductRepository
{
    public function find($id)
    {
        return Product::find($id);
    }

    public function findOrFail($id)
    {
        return Product::with(['category', 'variants', 'images'])
            ->findOrFail($id);
    }


    public function all()
    {
        return Product::all();
    }

    public function create(array $data)
    {       
        return Product::create($data);
    }

    public function update($id, array $data)
    {
        $product = Product::findOrFail($id);
        $product->update($data);
        return $product;
    }

    public function delete($id)
    {
        $product = $this->findOrFail($id);

        // Xóa mềm các biến thể liên quan
        $product->variants()->delete();

        // Xóa mềm các hình ảnh liên quan
        $product->images()->delete();

        // Xóa mềm sản phẩm
        $product->delete();
    }

    public function getTrashed()
    {
        return Product::onlyTrashed()->with('images')->get();
    }

    public function restore($id)
    {
        $product = Product::onlyTrashed()->findOrFail($id);
        $product->restore();
        return $product;
    }

    public function forceDelete($id)
    {
        $product = Product::onlyTrashed()->findOrFail($id);
        return $product->forceDelete();
    }
}
