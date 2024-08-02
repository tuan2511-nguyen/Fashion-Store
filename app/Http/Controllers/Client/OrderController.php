<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $orders = Order::where('user_id', $user->id)->get(); // Giả sử có quan hệ orders trong mô hình User
        return view('client.pages.order', compact('orders'));
    }

    public function show($id)
    {
        $order = Order::with(['details.variant.product'])->findOrFail($id); // Tìm đơn hàng theo ID

        return view('client.pages.order-detail', compact('order'));
    }
}
