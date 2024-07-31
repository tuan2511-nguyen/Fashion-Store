<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Color;
use App\Models\Size;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function index()
    {
        $cart = session()->get('cart', []);
        $sizes = Size::all()->pluck('size_name', 'id')->toArray(); // Danh sách size
        $colors = Color::all()->pluck('color_name', 'id')->toArray(); // Danh sách màu

        foreach ($cart as $productId => &$item) {
            $item['size_name'] = $sizes[$item['size_id']] ?? 'Unknown';
            $item['color_name'] = $colors[$item['color_id']] ?? 'Unknown';
        }
        return view('client.pages.cart', compact('cart'));
    }
    public function add(Request $request)
    {
        $cart = session()->get('cart', []);
        $productId = $request->input('product_id');
        $quantity = $request->input('quantity');
        $variantId = $request->input('variant_id');
        $price = $request->input('price');
        $sizeId = $request->input('size');
        $colorId = $request->input('color');
        $productName = $request->input('product_name');
        $productImage = $request->input('product_image');

        if (isset($cart[$variantId])) {
            $cart[$variantId]['quantity'] += $quantity;
            $cart[$variantId]['total'] = $cart[$variantId]['quantity'] * $cart[$variantId]['price'];
        } else {
            $cart[$variantId] = [
                'product_id' => $productId,
                'name' => $productName,
                'price' => $price,
                'quantity' => $quantity,
                'total' => $price * $quantity,
                'image' => $productImage,
                'size_id' => $sizeId, // Lưu ID size
                'color_id' => $colorId, // Lưu ID màu
                'variant_id' => $variantId
            ];
        }

        session()->put('cart', $cart);
        return redirect()->route('cart.index');
    }
    public function clearCart(Request $request)
    {
        $request->session()->forget('cart');
        return redirect()->route('cart.index');
    }
    public function removeFromCart(Request $request)
    {

        $cart = $request->session()->get('cart', []);

        $variantId = $request->input('variant_id');

        if (isset($cart[$variantId])) {
            unset($cart[$variantId]);
        }
        session()->put('cart', $cart);
        return redirect()->route('cart.index')->with('success', 'Product removed from cart.');
    }
    public function update(Request $request)
    {
        $cart = session()->get('cart', []);

        $productId = $request->input('product_id');
        $quantity = $request->input('quantity');

        if (isset($cart[$productId])) {
            // Cập nhật số lượng và tổng giá
            $cart[$productId]['quantity'] = $quantity;
            $cart[$productId]['total'] = $quantity * $cart[$productId]['price'];
        }

        session()->put('cart', $cart);
        return redirect()->route('cart.index'); // Hoặc trả về view tùy thuộc vào yêu cầu
    }
}
