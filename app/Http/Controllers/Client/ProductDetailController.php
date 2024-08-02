<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Review;
use Illuminate\Http\Request;

class ProductDetailController extends Controller
{

    public function index($id)
    {
        $product = Product::with(['category', 'variants', 'images'])->find($id);
        $reviews = Review::query()->where('product_id', $id)->latest()->take(3)->get();
        return view('client.pages.product-detail', compact('product', 'reviews'));
    }
    
}
