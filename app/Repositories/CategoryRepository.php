<?php

namespace App\Repositories;

use App\Models\Category;
use App\Interfaces\CategoryRepositoryInterface;

class CategoryRepository implements CategoryRepositoryInterface
{
    public function all()
    {
        return Category::all();
    }

    public function find($id)
    {
        return Category::find($id);
    }

    public function create(array $data)
    {
        return Category::create($data);
    }

    public function update($id, array $data)
    {
        $category = Category::find($id);

        if ($category) {
            $category->update($data);
            return $category;
        }

        return null;
    }

    public function delete($id)
    {
        $category = Category::find($id);

        if ($category) {
            $category->delete();
            return $category;
        }

        return null;
    }

    public function findWithTrashed($id)
    {
        return Category::withTrashed()->find($id);
    }

    public function restore($id)
    {
        $category = Category::onlyTrashed()->find($id);

        if ($category) {
            $category->restore();
            return $category;
        }

        return null;
    }

    public function forceDelete($id)
    {
        $category = Category::withTrashed()->find($id);

        if ($category) {
            $category->forceDelete();
            return $category;
        }

        return null;
    }

    public function trashed()
    {
        return Category::onlyTrashed()->get();
    }
}
