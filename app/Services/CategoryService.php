<?php

namespace App\Services;

use App\Interfaces\CategoryServiceInterface;
use App\Interfaces\CategoryRepositoryInterface;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;

class CategoryService implements CategoryServiceInterface
{
    protected $repository;

    public function __construct(CategoryRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }

    public function getAllCategories()
    {
        return $this->repository->all();
    }

    public function getCategoryById($id)
    {
        return $this->repository->find($id);
    }

    public function createCategory(array $data)
    {
        $rules = [
            'category_name' => 'required|string|max:255',
        ];

        $validator = Validator::make($data, $rules);

        if ($validator->fails()) {
            throw new ValidationException($validator);
        }
        return $this->repository->create($data);
    }

    public function updateCategory($id, array $data)
    {
        $rules = [
            'category_name' => 'required|string|max:255',
        ];

        $validator = Validator::make($data, $rules);

        if ($validator->fails()) {
            throw new ValidationException($validator);
        }
        return $this->repository->update($id, $data);
    }

    public function deleteCategory($id)
    {
        return $this->repository->delete($id);
    }

    public function restoreCategory($id)
    {
        return $this->repository->restore($id);
    }

    public function forceDeleteCategory($id)
    {
        return $this->repository->forceDelete($id);
    }

    public function getTrashedCategories()
    {
        return $this->repository->trashed();
    }
}
