<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Http\Requests\CheckoutRequest;
use App\Models\Order;
use App\Models\OrderDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckOutController extends Controller
{
    public function index()
    {
        $cart = session('cart', []);
        $subtotal = array_sum(array_column($cart, 'total'));
        return view('client.pages.checkout', compact('cart', 'subtotal'));
    }

    public function store(CheckoutRequest $request)
    {
        $cart = session('cart', []);
        $validated = $request->validated();
        $subtotal = array_sum(array_column($cart, 'total'));
        $userId = Auth()->user()->id;

        // Kiểm tra xem có mã giảm giá trong session không
        $discount = session('cart_discount', 0); // Mặc định là 0 nếu không có mã giảm giá
        $discountAmount = session('cart_discount_amount', 0); // Mặc định là 0 nếu không có mã giảm giá
        $totalAmount = session('cart_total', $subtotal); // Sử dụng tổng tiền sau khi giảm giá nếu có

        // Tạo đơn hàng mới
        $order = Order::create([
            'user_id' => $userId,
            'billing_name' => $validated['billing_name'],
            'province' => $validated['province'],
            'district' => $validated['district'],
            'ward' => $validated['ward'],
            'billing_address' => $validated['address'],
            'billing_number_phone' => $validated['phone'],
            'order_notes' => $validated['order_notes'],
            'payment_method' => $validated['payment_method'],
            'total_amount' => $totalAmount, // Sử dụng tổng tiền sau khi giảm giá
            'order_date' => now(),
        ]);

        // Tạo chi tiết đơn hàng
        foreach ($cart as $item) {
            OrderDetail::create([
                'order_id' => $order->id,
                'variant_id' => $item['variant_id'],
                'quantity' => $item['quantity'],
                'price' => $item['total'],
            ]);
        }

        // Xóa thông tin giỏ hàng và mã giảm giá khỏi session
        $request->session()->forget('cart');
        $request->session()->forget('cart_discount');
        $request->session()->forget('cart_discount_amount');
        $request->session()->forget('cart_total');
        $request->session()->forget('coupon_code');

        return redirect()->route('checkout.success')->with('success', 'Đặt hàng thành công.');
    }
}
