<?php

namespace App\Interfaces;

interface CategoryServiceInterface
{
    public function getAllCategories();
    public function getCategoryById($id);
    public function createCategory(array $data);
    public function updateCategory($id, array $data);
    public function deleteCategory($id);
    public function restoreCategory($id);
    public function forceDeleteCategory($id);
    public function getTrashedCategories();
}
