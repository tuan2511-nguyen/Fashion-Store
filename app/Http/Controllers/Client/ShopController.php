<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Color;
use App\Models\Product;
use App\Models\Size;
use Illuminate\Http\Request;

class ShopController extends Controller
{
    public function index()
    {
        $products = Product::with(['images', 'variants'])->latest()->paginate(12);
        $categories = Category::all();
        $sizes = Size::all();
        $colors = Color::all();
        return view('client.pages.shop', compact('products', 'categories', 'sizes', 'colors'));
    }
}
