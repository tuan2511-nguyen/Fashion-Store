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
    public function index(Request $request)
    {
        $categories = Category::all();
        $colors = Color::all();
        $sizes = Size::all();

        $products = Product::with('variants', 'images')->latest();
        // dd($products);
        // // Apply category filter
        if ($request->has('categories')) {
            $products->whereIn('category_id', $request->categories);
        }

        // // Apply price filter
        if ($request->has('price_range')) {
            $priceRange = explode('-', $request->price_range);
            $products->whereHas('variants', function ($query) use ($priceRange) {
                $query->whereBetween('price', [$priceRange[0], $priceRange[1]]);
            });
        }

        // // Apply color filter
        if ($request->has('color')) {
            $products->whereHas('variants', function ($query) use ($request) {
                $query->where('color_id', $request->color);
            });
        }

        // // Apply size filter
        if ($request->has('size')) {
            $products->whereHas('variants', function ($query) use ($request) {
                $query->where('size_id', $request->size);
            });
        }
        if ($request->has('sort')) {
            switch ($request->sort) {
                case '1':
                    $products->whereHas('variants', function ($query) {
                        $query->orderBy('price', 'asc');
                    });
                    break;
                case '2':
                    $products->whereHas('variants', function ($query) {
                        $query->orderBy('price', 'desc');
                    });
                    break;
                default:
                    $products->orderBy('id', 'desc');
                    break;
            }
        } else {
            $products->orderBy('id', 'desc');
        }



        $products = $products->paginate(12);
        return view('client.pages.shop', compact('categories', 'colors', 'sizes', 'products'));
    }
}
