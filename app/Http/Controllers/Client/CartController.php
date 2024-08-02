<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Color;
use App\Models\Coupon;
use App\Models\ProductVariant;
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
        $stock = $request->input('stock_quantity');
        $token = $request->input('_token');

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
                'variant_id' => $variantId,
                'stock' => $stock,
                'token' => $token
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
        $variantId = $request->input('variant_id');
        $quantity = $request->input('quantity');

        // Tìm biến thể sản phẩm dựa trên variantId
        $productVariant = ProductVariant::find($variantId);

        if ($productVariant) {
            $stockQuantity = $productVariant->stock_quantity;

            if ($quantity <= $stockQuantity) {
                // Cập nhật số lượng và tổng giá
                if (isset($cart[$variantId])) {
                    $cart[$variantId]['quantity'] = $quantity;
                    $cart[$variantId]['total'] = $quantity * $cart[$variantId]['price'];
                    session()->put('cart', $cart);
                    $subtotal = array_sum(array_column($cart, 'total'));

                    // Thay vì trả về JSON, bạn có thể chuyển hướng hoặc trả về view tùy ý
                    return redirect()->route('cart.index')->with('success', 'Cart updated successfully.');
                } else {
                    return redirect()->route('cart.index')->with('error', 'Product not found in cart.');
                }
            } else {
                return redirect()->route('cart.index')->with('error', 'Requested quantity exceeds stock.');
            }
        }

        return redirect()->route('cart.index')->with('error', 'Product variant not found.');
    }
    public function applyCoupon(Request $request)
    {
        $couponCode = $request->input('coupon_code');

        // Kiểm tra coupon code
        $coupon = Coupon::where('coupon_code', $couponCode)->first();

        if (!$coupon) {
            return redirect()->back()->with('coupon_error', 'Mã giảm giá không hợp lệ.');
        }

        // Kiểm tra ngày hết hạn
        if ($coupon->expiration_date && $coupon->expiration_date < now()) {
            return redirect()->back()->with('coupon_error', 'Mã giảm giá đã hết hạn.');
        }

        // Tính toán giảm giá
        $discount = $coupon->discount_value; // Giảm giá theo phần trăm
        $cart = session()->get('cart', []);
        $subtotal = array_sum(array_column($cart, 'total'));

        // Tính tổng tiền sau khi giảm giá
        $discountAmount = $subtotal * ($discount / 100);
        $total = $subtotal - $discountAmount;

        // Cập nhật giỏ hàng trong session
        session()->put('cart_discount', $discount);
        session()->put('cart_discount_amount', $discountAmount);
        session()->put('cart_total', $total);
        return redirect()->back()->with('coupon_success', 'Mã giảm giá đã được áp dụng.');
    }
}
