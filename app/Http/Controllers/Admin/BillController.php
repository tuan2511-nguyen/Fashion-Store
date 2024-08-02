<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;

class BillController extends Controller
{
    public function index()
    {
        $orders = Order::with('customer')->get();
        return view('admin.pages.orders.index', compact('orders'));
    }

    public function show($id)
    {
        $order = Order::with(['details.variant.product'])->findOrFail($id);
        return view('admin.pages.orders.show', compact('order'));
    }
    public function update(Request $request, $id)
    {
        $order = Order::findOrFail($id);

        // Validate the request
        $request->validate([
            'status' => 'required|in:pending,processing,completed,canceled',
        ]);

        // If the new status is pending, adjust the stock
        if ($request->status == 'pending') {
            $this->adjustStock($order);
        }

        // Update the order status
        $order->status = $request->status;
        $order->save();

        return redirect()->route('orders.show', ['order' => $order->id])
            ->with('success', 'Trạng thái đơn hàng đã được cập nhật.');
    }

    private function adjustStock($order)
    {
        foreach ($order->details as $detail) {
            $productVariant = $detail->variant;
            $productVariant->stock_quantity -= $detail->quantity;
            $productVariant->save();
        }
    }
}
