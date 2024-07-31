<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductDetailController extends Controller
{

    public function index($id)
    {
        $product = Product::with(['category', 'variants', 'images'])->find($id);
        return view('client.pages.product-detail', compact('product'));
    }
}
