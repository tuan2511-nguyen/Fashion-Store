<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\CategoryService;
use Illuminate\Validation\ValidationException;

class CategoryController extends Controller
{
    protected $service;

    public function __construct(CategoryService $service)
    {
        $this->service = $service;
    }

    public function index()
    {
        $categories = $this->service->getAllCategories();
        return view('admin.pages.categories.index', compact('categories'));
    }
    
    public function trashed()
    {
        $trashedCategories  = $this->service->getTrashedCategories();
        return view('admin.pages.categories.trashed', compact('trashedCategories'));
    }

    public function create()
    {
        return view('admin.pages.categories.create');
    }

    public function store(Request $request)
    {
        try {
            $this->service->createCategory($request->all());
            return redirect()->route('categories.index')->with('success', 'Category created successfully.');
        } catch (ValidationException $e) {
            return redirect()->back()->withErrors($e->errors())->withInput();
        }
    }

    public function edit($id)
    {
        $category = $this->service->getCategoryById($id);
        return view('admin.pages.categories.edit', compact('category'));
    }

    public function update(Request $request, $id)
    {
        try {
            $this->service->updateCategory($id, $request->all());
            return redirect()->route('categories.index')->with('success', 'Category updated successfully.');
        } catch (ValidationException $e) {
            return redirect()->back()->withErrors($e->errors())->withInput();
        }
    }

    public function destroy($id)
    {
        $this->service->deleteCategory($id);
        return redirect()->route('categories.index');
    }

    public function restore($id)
    {
        $this->service->restoreCategory($id);
        return redirect()->route('categories.trashed');
    }

    public function forceDelete($id)
    {
        $this->service->forceDeleteCategory($id);
        return redirect()->route('categories.trashed');
    }
}
