<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProductRequest;
use App\Models\Category;
use App\Models\Color;
use App\Models\Product;
use App\Models\Size;
use App\Services\ProductImageService;
use App\Services\ProductService;
use App\Services\ProductVariantService;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class ProductController extends Controller
{
    protected $productService;
    protected $variantService;
    protected $imageService;

    public function __construct(ProductService $productService, ProductVariantService $variantService, ProductImageService $imageService)
    {
        $this->productService = $productService;
        $this->variantService = $variantService;
        $this->imageService = $imageService;
    }

    public function index()
    {
        $products = $this->productService->getAllProducts();
        return view('admin.pages.products.index', compact('products'));
    }

    public function show($id){
        $product = $this->productService->getProductById($id);
        return view('admin.pages.products.show', compact('product'));
    }

    public function create()
    {

        $categories = Category::all();
        $sizes = Size::all();
        $colors = Color::all();

        return view('admin.pages.products.create', compact('categories', 'sizes', 'colors'));
    }

    public function store(ProductRequest $request)
    {
        try {
            $validatedData = $request->validated();

            // Tạo sản phẩm
            $product = $this->productService->createProduct($validatedData);

            // Tạo biến thể sản phẩm
            $this->variantService->createVariants($product, $validatedData['sizes'], $validatedData['colors'], $validatedData['variants']);

            // Lưu ảnh sản phẩm
            if ($request->hasFile('images_url')) {
                $this->imageService->createImages($product, $request->file('images_url'));
            }

            return redirect()->route('products.index')->with('success', 'Sản phẩm đã được thêm thành công.');
        } catch (ValidationException $e) {
            return redirect()->back()->withErrors($e->errors())->withInput();
        }
    }
    public function edit($id)
    {
        $product = $this->productService->getProductById($id);
        $categories = Category::all();
        $sizes = Size::all();
        $colors = Color::all();
        return view('admin.pages.products.edit', compact('product', 'categories', 'sizes', 'colors'));
    }
    public function update(ProductRequest $request, $id)
    {
        try {
            $validatedData = $request->validated();

            $this->productService->updateProduct($id, $validatedData);

            return redirect()->route('products.index')->with('success', 'Sản phẩm đã được cập nhật!');
        } catch (ValidationException $e) {
            return redirect()->back()->withErrors($e->errors())->withInput();
        } catch (ModelNotFoundException $e) {
            return redirect()->route('products.index')->with('error', 'Sản phẩm không tồn tại.');
        }
    }


    public function destroy($id)
    {
        try {
            $this->productService->deleteProduct($id);
            return redirect()->route('products.index')->with('success', 'Sản phẩm và các dữ liệu liên quan đã được xóa thành công.');
        } catch (\Exception $e) {
            return redirect()->route('products.index')->with('error', 'Có lỗi xảy ra trong quá trình xóa sản phẩm.');
        }
    }
    public function trashed()
    {
        $deletedProducts = $this->productService->getTrashedProducts();
        $deletedProductImages = $this->imageService->getTrashedImages();
        return view('admin.pages.products.trashed', compact('deletedProducts', 'deletedProductImages'));
    }

    public function restore($id)
    {
        $this->productService->restoreProduct($id);
        return redirect()->back()->with('success', 'Sản phẩm đã được phục hồi!');
    }

    public function forceDelete($id)
    {
        $this->productService->forceDeleteProduct($id);
        return redirect()->route('products.trashed');
    }
}
