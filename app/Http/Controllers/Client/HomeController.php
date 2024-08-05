<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Banner;
use App\Models\Category;
use App\Models\Product;
use App\Models\ProductImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index()
    {   
        $categories = Category::all();
        $banners = Banner::query()->latest()->take(3)->get();
        $productRandom5 = Product::with(['images', 'variants'])->inRandomOrder()->take(5)->get();
        $latestProducts  = Product::with('images')->latest()->take(5)->get();
        $images = ProductImage::latest()->take(6)->get(); 
        return view('client.pages.home', compact('categories', 'banners', 'productRandom5', 'images', 'latestProducts'));
    }
}
